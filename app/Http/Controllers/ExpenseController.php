<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Finance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses=Expense::where('deletion',0)
            ->orderBy('date','desc')
            ->get();
//        dd($expenses);
       return view('expense.index')->withExpenses($expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required|max:40',
            'purpose'=>'required|max:40',
            'amount'=>'required|numeric|between:0.00,999999.99',
            'date'=>'required|date|max:200'
        ]);

        $expense=new Expense();
        $expense->purpose=$request->purpose;
        $expense->name=$request->name;
        $expense->date=Carbon::parse($request->date);
        $expense->amount=$request->amount;
        $expense->type=1;   //1 for cash
        $expense->comment=$request->comment;
        $expense->user_id=Auth::id();
        $expense->deletion=0;
        $expense->save();
//       dd($request);

        Session::flash('message','Expense added successfully!');
        return redirect()->route('expense.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDailyExpense(){
        return view('expense.daily_expense_report');
    }

    public function showDailyExpense(Request $request){
        $this->validate($request,[
            'date'=>'required|date|max:200'
        ]);
        $date=Carbon::parse($request->date);

        $expenses=Expense::where('deletion',0)
            ->whereBetween('date',[$date->format('Y-m-d')." 00:00:00", $date->format('Y-m-d')." 23:59:59"])
            ->get();
//        dd($expenses);
        return view('expense.daily_expense_report')->withExpenses($expenses);

    }

    public function getFinancialReport(){
        return view('expense.daily_financial_report');
    }

    public function showFinancialReport(Request $request){
        $this->validate($request,[
            'date'=>'required|date|max:200'
        ]);
        $date=Carbon::parse($request->date);

        $financials=Finance::where('deletion',0)
            ->whereBetween('created_at',[$date->format('Y-m-d')." 00:00:00", $date->format('Y-m-d')." 23:59:59"])
            ->get();

        $expenses=DB::table('expenses')
        ->where('deletion',0)
            ->whereBetween('created_at',[$date->format('Y-m-d')." 00:00:00", $date->format('Y-m-d')." 23:59:59"])
            ->sum('amount');

//        dd($expenses);
        return view('expense.daily_financial_report')->withFinancials($financials)->withExpenses($expenses);

    }
}
