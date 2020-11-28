<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\inbound_detail;
use App\Models\outbound_detail;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $stok = DB::table('outbound_details')->select('outbound_details.qty', 'inbound_details.qty as qtyInbound')->join('inbound_details', 'inbound_details.id', '=', 'outbound_details.id')->get();
        
        // $stok = DB::table('inbound_details')->join('outbound_details', 'inbound_details.id', '=', 'outbound_details.id')->select(DB::raw('(inbound_details.qty-outbound_details.qty) as total'));

        
        $stok = DB::table('outbound_details')->select(DB::raw('products.code, products.name, inbound_details.qty as barang_masuk, outbound_details.qty as barang_keluar, (inbound_details.qty - outbound_details.qty ) as total '))
          ->Join('inbound_details','outbound_details.faktur_inbound_detail','=','inbound_details.id')
          ->Join('po_details','inbound_details.faktur_po_detail','=','po_details.id')
          ->Join('products','po_details.code_faktur','=','products.code')
          ->get();

        return response()->json([
            "msg" => "GET method Success",
            "data" =>  $stok
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new product;
        $product->name = $request->name;
        $product->id_type = $request->id_type;

        $product->save();
        return response()->json([
            "msg" => "Post Method Success",
            "data" => $product
        ]);
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
        $product = product::where('code', $id)->first();

        if ($product) {
            $product->name = $request->name ? $request->name : $product->name;
            $product->id_type = $request->id_type ? $request->id_type : $product->id_type;

            $product->save();

            return response()->json([
                "msg" => "PUT Method Success",
                "data" => $product
            ]);

        }
        return response()->json([
            "msg" => "Delete Method Failed, Id ". $id . " Not Found"
        ], 400);
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
        $product = product::where('code', $id)->first();

        if ($product) {
            $product->delete();
            return response()->json([
                "msg" => "Delete Method Success"
            ]);
        }
        return response()->json([
            "msg" => "Delete Method Failed, ID ". $id . " Not Found"
        ], 400);
    }
    public function laporan_produk()
    {
        return view('laporan.produk');
    }

    public function cetak_laporan_mingguan()
    {
        // dd("Tanggal Awal".$tgl_awal. "Tanggal Akhir". $tgl_akhir);
        
        //   $cetak = DB::table('outbound_details')->select(DB::raw('products.code, products.name, inbound_details.qty as barang_masuk, outbound_details.qty as barang_keluar, (inbound_details.qty - outbound_details.qty ) as total '))
        //   ->Join('inbound_details','outbound_details.faktur_inbound_detail','=','inbound_details.id')
        //   ->Join('po_details','inbound_details.faktur_po_detail','=','po_details.id')
        //   ->Join('products','po_details.code_faktur','=','products.code')->whereBetween('inbound_details.created_at', [$tgl_awal, $tgl_akhir])->get();
        // dd($cetak);
        // return view('laporan.cetak_produk',['produk'=>$cetak]);

        $results = DB::select( DB::raw("SELECT products.code as Kode, products.name as 'Nama Barang', inbound_details.qty as 'Barang Masuk', outbound_details.qty as 'Barang Keluar',
        (inbound_details.qty - outbound_details.qty) as 'Total' FROM inbounds
        LEFT join inbound_details on inbounds.faktur = inbound_details.faktur_inbound
        LEFT join outbound_details on inbound_details.id = outbound_details.faktur_inbound_detail
        left join outbounds on outbound_details.faktur_outbound = outbounds.faktur
        left join po_details on inbound_details.faktur_po_detail = po_details.id
        left join products on po_details.code_faktur = products.code
        WHERE
        inbounds.date BETWEEN 
        (SELECT SUBDATE(now(),INTERVAL 20 DAY)) and now() AND
        outbounds.date BETWEEN 
        (SELECT SUBDATE(now(),INTERVAL 20 DAY)) and now()
        
        "));
        return response()->json([
            "msg" => "GET ID Method Success",
            "data" => $results
        ]);
    }
    public function cetak_laporan_bulanan()
    {
        $results = DB::select( DB::raw("SELECT products.code as Kode, products.name as 'Nama Barang', inbound_details.qty as 'Barang Masuk', outbound_details.qty as 'Barang Keluar',
        (inbound_details.qty - outbound_details.qty) as 'Total' FROM inbounds
        LEFT join inbound_details on inbounds.faktur = inbound_details.faktur_inbound
        LEFT join outbound_details on inbound_details.id = outbound_details.faktur_inbound_detail
        left join outbounds on outbound_details.faktur_outbound = outbounds.faktur
        left join po_details on inbound_details.faktur_po_detail = po_details.id
        left join products on po_details.code_faktur = products.code
        WHERE
        inbounds.date BETWEEN 
        (SELECT SUBDATE(now(),INTERVAL 20 DAY)) and now() AND
        outbounds.date BETWEEN 
        (SELECT SUBDATE(now(),INTERVAL 20 DAY)) and now()
        
        "));
        return response()->json([
            "msg" => "GET ID Method Success",
            "data" => $results
        ]);
    }
    public function cetak_laporan_tahunan()
    {
        $results = DB::select( DB::raw("SELECT products.code as Kode, products.name as 'Nama Barang', inbound_details.qty as 'Barang Masuk', outbound_details.qty as 'Barang Keluar',
        (inbound_details.qty - outbound_details.qty) as 'Total' FROM inbounds
        LEFT join inbound_details on inbounds.faktur = inbound_details.faktur_inbound
        LEFT join outbound_details on inbound_details.id = outbound_details.faktur_inbound_detail
        left join outbounds on outbound_details.faktur_outbound = outbounds.faktur
        left join po_details on inbound_details.faktur_po_detail = po_details.id
        left join products on po_details.code_faktur = products.code
        WHERE
        inbounds.date BETWEEN 
        (SELECT SUBDATE(now(),INTERVAL 20 DAY)) and now() AND
        outbounds.date BETWEEN 
        (SELECT SUBDATE(now(),INTERVAL 20 DAY)) and now()
        
        "));
        return response()->json([
            "msg" => "GET ID Method Success",
            "data" => $results
        ]);
    }
}
