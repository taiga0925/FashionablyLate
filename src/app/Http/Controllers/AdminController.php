<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Livewire\Component;
use Livewire\WithPagination;

class AdminController extends Controller
{
    use WithPagination;


    public function admin()
    {

        $categories = Category::all();

        return view('admin', compact('categories'), ['contacts'=>Contact::with('category')->paginate(7)]);
    }

    public function search(Request $request)
    {

        $categories = Category::all();

        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->CalendarSearch($request->from)->paginate(7);


        return view('admin', compact('categories', 'contacts') );
    }

    public function export(Request $request)
    {
        $contacts = Contact::query();
        
        $headers = [
        'ID', 'Category_ID', 'first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail'
        ];

        $headers = array_map(function ($header) {
            return mb_convert_encoding($header, 'SJIS-win', 'UTF-8');
        }, $headers);

        $callback = function() use ($contacts, $headers) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $headers);

            // データを一行ずつ書き込む
            foreach ($query->cursor() as $row) {
                $csvData = [
                    $row->ID,
                    $row->Category_ID,
                    $row->first_name,
                    $row->last_name,
                    $row->gender,
                    $row->email,
                    $row->tel,
                    $row->address,
                    $row->building,
                    $row->detail,
                ];

                // 各行のデータをShift-JISに変換して出力
                $csvData = array_map(function ($field) {
                    $normalizedField = Normalizer::normalize($field, Normalizer::FORM_C);
                    return mb_convert_encoding($normalizedField, 'SJIS-win', 'auto');
                }, $csvData);

                fputcsv($handle, $csvData);
            }
            fclose($handle);
        };

         $fileName = 'contact' . date('Ymd') . '.csv';

        return new StreamedResponse($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ]);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}