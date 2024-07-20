<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KonserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $konsers = Konser::paginate(10);
        return view('konser.index', compact('konsers'));
    }
    public function create()
    {
        return view('konser.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $value = [
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'date' => $request->input('date'),
            'start_time' => $request->input('date') . ' ' . $request->input('start_time') . ':00',
            'image' => $imagePath,
        ];
        // dd($value);

        $konser = Konser::create($value);
        $defaultTickets = [
            ['category' => 'Gold', 'price' => 100000.00, 'quantity' => 100],
            ['category' => 'Silver', 'price' => 75000.00, 'quantity' => 200],
            ['category' => 'Bronze', 'price' => 50000.00, 'quantity' => 300],
        ];
        foreach ($defaultTickets as $ticket) {
            Tiket::create([
                'konser_id' => $konser->id,
                'category' => $ticket['category'],
                'price' => $ticket['price'],
                'quantity' => $ticket['quantity'],
            ]);
        }
        return redirect(route('admin.konser'));
    }
    public function edit(string $id)
    {
        $konser = Konser::findOrFail($id);
        return view('konser.edit', compact('konser'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $konser = Konser::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($konser->image) {
                Storage::disk('public')->delete($konser->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $konser->image = $imagePath;
        }

        $konser->name = $request->input('name');
        $konser->location = $request->input('location');
        $konser->date = $request->input('date');
        $konser->start_time = $request->input('date') . ' ' . $request->input('start_time') . ':00';
        // dd($konser);
        $konser->save();

        return redirect()->route('admin.konser')->with('success', 'Konser berhasil diperbarui.');
    }
    public function destroy(string $id)
    {
        $konser =  Konser::find($id);
        if ($konser && $konser->image) {
            Storage::disk('public')->delete($konser->image);
        }

        if ($konser) {
            $konser->delete();
        }
        return redirect(route('admin.konser'))->with('success', 'Konser berhasil dihapus.');
    }
}
