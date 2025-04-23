<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\UserModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use Illuminate\Support\Facades\DB;
use App\Models\PenjualanDetailModel;

class WelcomeController extends Controller
{
    public function index()
    {
        // breadcrumb & menu aktif
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list'  => ['Home', 'Welcome']
        ];
        $activeMenu = 'dashboard';
        // ambil data statistik
        $totalUsers      = UserModel::count();
        $totalProducts   = BarangModel::count();
        $todaySalesCount = PenjualanModel::whereDate('penjualan_tanggal', today())->count();
        $lowStockCount   = BarangModel::where('barang_stok', '<', 5)->count();

        // jumlah penjualan minggu ini
        $thisWeekSalesCount = PenjualanModel::whereBetween('penjualan_tanggal', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        // data penjualan per hari
        $daily = PenjualanDetailModel::join('t_penjualan', 't_penjualan_detail.penjualan_id', '=', 't_penjualan.penjualan_id')
            ->select(
                DB::raw("DATE(penjualan_tanggal) as date"),
                DB::raw('SUM(harga) as total')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $dailyLabels = $daily->pluck('date')->map(fn($d) => Carbon::parse($d)->format('d M Y'));
        $dailyValues = $daily->pluck('total');
        return view('welcome', compact(
            'breadcrumb',
            'activeMenu',
            'totalUsers',
            'totalProducts',
            'thisWeekSalesCount',
            'todaySalesCount',
            'lowStockCount',
            'dailyLabels',
            'dailyValues'
        ));
    }
}
