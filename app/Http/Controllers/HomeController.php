<?php

namespace App\Http\Controllers;

use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Http\Request;
use App\Models\Monitoring;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $number_blocks = [
            [
                'title' => 'Users Logged In Today',
                'number' => User::whereDate('last_login_at', today())->count()
            ],
            [
                'title' => 'Users Logged In Last 7 Days',
                'number' => User::whereDate('last_login_at', '>', today()->subDays(7))->count()
            ],
            [
                'title' => 'Users Logged In Last 30 Days',
                'number' => User::whereDate('last_login_at', '>', today()->subDays(30))->count()
            ],
        ];

        $list_blocks = [
            [
                'title' => 'Last Logged In Users',
                'entries' => User::orderBy('last_login_at', 'desc')
                    ->take(5)
                    ->get(),
            ],
            [
                'title' => 'Users Not Logged In For 30 Days',
                'entries' => User::where('last_login_at', '<', today()->subDays(30))
                    ->orwhere('last_login_at', null)
                    ->orderBy('last_login_at', 'desc')
                    ->take(5)
                    ->get()
            ],
        ];

        $chart_settings = [
            'chart_title'        => 'Users By Months',
            'chart_type'         => 'line',
            'report_type'        => 'group_by_date',
            'model'              => 'App\\User',
            'group_by_field'     => 'last_login_at',
            'group_by_period'    => 'month',
            'aggregate_function' => 'count',
            'filter_field'       => 'last_login_at',
            'column_class'       => 'col-md-12',
            'entries_number'     => '5',
        ];
        // $chart = new LaravelChart($chart_settings);
        // , 'chart'


        $role = $request->session()->get('role'); 
        $id = $request->session()->get('id');
        if($role == 2){
            $sudahBTS = Monitoring::where('id_user_surveyor',$id)->whereNotNull('tgl_kunjungan')->get()->count();
            $belumBTS = Monitoring::where('id_user_surveyor',$id)->whereNull('tgl_kunjungan')->get()->count();
        }else{ 
            $sudahBTS = Monitoring::whereNotNull('tgl_kunjungan')->get()->count();
            $belumBTS = Monitoring::whereNull('tgl_kunjungan')->get()->count();
        } 

        return view('home', compact('number_blocks', 'list_blocks', 'sudahBTS', 'belumBTS'));
      
    }
}
