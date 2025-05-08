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
        $contacts = Contact::all();

        $csvHeader = [
        'ID', 'Category_ID', 'first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail'
        ];

        $csvData = $contacts->toArray();

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);

        return $response;
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}