<?php

namespace App\Http\Controllers;

use App\MonthlyPayment;
use App\Payment;
use App\StudentPayment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
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

    public function getMonthly(){
    	$monthly = MonthlyPayment::where('state',1)->orderBy('idmonthly_payment','desc')->paginate(10);
    	return ['monthly' => $monthly];
    }

    public function getStudent($ci){
    	$student = User::where('ci',$ci)->first();
    	return ['student' => $student];
    }

    public function store(Request $request)
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
            $detalle->id_monthly_payment = $value['mensualidad_id'];
            $detalle->id_payment = $payment->idpayment;
            $detalle->price = $value['price'];
            $detalle->save();
        }
        return ['id' => $payment->idpayment]; 
        return redirect()->route('pagos.index');
    }
    public function pdf($id){
        $payment = Payment::join('users','payments.id_student','=','users.iduser')->select('payments.nit_ci','payments.date','payments.invoice_series','payments.invoice_number','payments.total_payment','payments.state','users.name','users.paternal','users.maternal','users.ci','users.address','users.phone','users.email','payments.idpayment')
                    ->where('payments.idpayment','=',$id)->get();

        $detalles = StudentPayment::join('monthly_payments','student_payments.id_monthly_payment','monthly_payments.idmonthly_payment')
                    ->select('monthly_payments.description','monthly_payments.price','student_payments.price')->where('student_payments.id_payment','=',$id)->get();
        $numeroPago = Payment::select('invoice_number')->where('idpayment','=',$id)->get();
        $pdf = \PDF::loadView('pdf.studentpayments',['payment' => $payment,'detalles' => $detalles]);
        return $pdf->stream('Pago -'.$numeroPago[0]->invoice_number.'.pdf');
    }

    public function active($id)
    {
        $monthly = MonthlyPayment::findOrFail($id);
        $monthly->state = true;
        $monthly->save();
        return redirect()->route('mensualidad.index');
    }

    public function desactive($id)
    {
        $monthly = MonthlyPayment::findOrFail($id);
        $monthly->state = false;
        $monthly->save();
        return redirect()->route('mensualidad.index');
    }

    public function search(Request $request){
        $palabra = $request->buscar;
        if($palabra == ''){
            $monthlypayments = MonthlyPayment::select('idmonthly_payment','start_date','end_date','description')->where('state','=',1)  
                        ->orderBy('idmonthly_payment','desc')->paginate(5);
        }else{
            $monthlypayments = MonthlyPayment::select('idmonthly_payment','start_date','end_date','description')
                    ->where('idmonthly_payment', 'like', '%'.$palabra.'%')->orWhere('start_date','like','%'.$palabra.'%')->orWhere('end_date','like','%'.$palabra.'%')->orWhere('description','like','%'.$palabra.'%')->andWhere('state','=',1)->paginate(8);
        }
        return [
            'monthlypayments' => $monthlypayments
        ];
    }

    public function detallePago($id){
        $payment = Payment::join('users','payments.id_student','=','users.iduser')->select('payments.nit_ci','payments.date','payments.invoice_series','payments.invoice_number','payments.total_payment','payments.state','users.name','users.paternal','users.maternal','users.ci','users.address','users.phone','users.email','payments.idpayment')
                    ->where('payments.idpayment','=',$id)->get();

        $detalles = StudentPayment::join('monthly_payments','student_payments.id_monthly_payment','monthly_payments.idmonthly_payment')
                    ->select('monthly_payments.description','monthly_payments.price','student_payments.price')->where('student_payments.id_payment','=',$id)->get();
        return view('studentpayments.detail',[
            'payment' => $payment,
            'detalles' => $detalles
        ]);

    }
}
