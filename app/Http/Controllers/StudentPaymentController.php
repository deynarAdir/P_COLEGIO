<?php

namespace App\Http\Controllers;

use App\MonthlyPayment;
use App\Payment;
use App\Student;
use App\StudentFee;
use App\StudentPayment;
use App\Http\Requests\StoreStudentPayment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentPaymentController extends Controller
{
    public function index()
    {
        $studentpayments = Payment::join('users','payments.id_student','=','users.iduser')->select('payments.nit_ci','payments.date','payments.invoice_series','payments.invoice_number','payments.total_payment','payments.state','users.name','users.paternal','users.maternal','payments.idpayment')->orderBy('payments.idpayment','desc')->paginate(10);
        return view('studentpayments.index',['studentpayments'=> $studentpayments]);
        // ->select('monthly_payments.description','monthly_payments.price','payments.invoice_number','payments.nit_ci','payments.date','payments.total_payment','payments.state')
        //     ->orderBy('idstudent_payment','desc')->paginate(10);
    }

    public function create()
    {
    	$students = User::where('id_rol',4)->get();
        return view('studentpayments.create',[
        	'students' => $students
        ]);
    }

    public function getMonthly($id){
        $student = Student::join('fee_types','students.id_fee','=','fee_types.idfee_type')->select('fee_types.discount','students.idstudent')->where('students.id_user','=',$id)->first();
    	$feeStudent = StudentFee::join('students','student_fees.id_student','students.idstudent')->join('fee_types','students.id_fee','=','fee_types.idfee_type')->where('student_fees.state',1)->where('student_fees.id_student','=',$student->idstudent)->select('student_fees.idstudent_fee','student_fees.start_date','student_fees.end_date','student_fees.price','fee_types.description')->orderBy('idstudent_fee','desc')->paginate(10);
    	return ['feeStudent' => $feeStudent,'discount' => $student->discount];
    }

    public function getStudent($ci){
    	$student = User::where('ci',$ci)->first();
    	return ['student' => $student];
    }

    public function store(StoreStudentPayment $request)
    {
        $fecha = Carbon::now('America/La_Paz');
        $payment = new Payment;
        $payment->id_student = $request->id_student;
        $payment->id_user = Auth::user()->iduser;
        $payment->nit_ci = $request->nit_ci;
        $payment->date = $fecha->toDateString();
        $payment->invoice_series = $request->invoice_series;
        $payment->invoice_number = $request->invoice_number;
        $payment->total_payment = $request->total_payment;
        $payment->state = 'regitrado';
        $payment->save();

        $detalles = $request->mensualidades;

        foreach ($detalles as $key => $value) {
            $detalle = new StudentPayment;
            $detalle->id_student_fee = $value['mensualidad_id'];
            $detalle->id_payment = $payment->idpayment;
            $detalle->price = $value['price'];
            $detalle->save();
            $studentFee = StudentFee::findOrFail($value['mensualidad_id']);
            $studentFee->state = 0;
            $studentFee->save();
        }
        return ['id' => $payment->idpayment];
    }
    public function pdf($id){
        $payment = Payment::join('users','payments.id_student','=','users.iduser')->select('payments.nit_ci','payments.date','payments.invoice_series','payments.invoice_number','payments.total_payment','payments.state','users.name','users.paternal','users.maternal','users.ci','users.address','users.phone','users.email','payments.idpayment')
                    ->where('payments.idpayment','=',$id)->get();

        $detalles = StudentPayment::join('student_fees','student_payments.id_student_fee','student_fees.idstudent_fee')
            ->join('students','student_fees.id_student','students.idstudent')
            ->join('fee_types','students.id_fee','fee_types.idfee_type')
            ->select('student_fees.price','student_payments.price as price2','fee_types.discount','fee_types.description')->where('student_payments.id_payment','=',$id)->get();
        $numeroPago = Payment::select('invoice_number')->where('idpayment','=',$id)->get();
        $pdf = \PDF::loadView('pdf.studentpayments',['payment' => $payment,'detalles' => $detalles]);
        return $pdf->stream('Pago -'.$numeroPago[0]->invoice_number.'.pdf');
    }

    public function detallePago($id){
        $payment = Payment::join('users','payments.id_student','=','users.iduser')->select('payments.nit_ci','payments.date','payments.invoice_series','payments.invoice_number','payments.total_payment','payments.state','users.name','users.paternal','users.maternal','users.ci','users.address','users.phone','users.email','payments.idpayment')
                    ->where('payments.idpayment','=',$id)->get();

        $detalles = StudentPayment::join('student_fees','student_payments.id_student_fee','student_fees.idstudent_fee')
            ->join('students','student_fees.id_student','students.idstudent')
            ->join('fee_types','students.id_fee','fee_types.idfee_type')
            ->select('student_fees.price','student_payments.price as price2','fee_types.discount','fee_types.description')->where('student_payments.id_payment','=',$id)->get();
        return view('studentpayments.detail',[
            'payment' => $payment,
            'detalles' => $detalles
        ]);

    }
}
