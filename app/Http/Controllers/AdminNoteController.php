<?php
// file: app/Http/Controllers/AdminNoteController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Message;

class AdminNoteController extends Controller
{
    public function index(Request $request){
        // Query untuk filter
        
        $query = Note::with(['user', 'messages']);

        
        
        // Filter status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        // Filter kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }
        
        // Filter tanggal
        if ($request->has('date_range') && $request->date_range != '') {
            $dateRange = $request->date_range;
            
            if ($dateRange === 'today') {
                $query->whereDate('created_at', Carbon::today());
            } elseif ($dateRange === 'week') {
                $query->whereBetween('created_at', [
                    Carbon::now()->startOfWeek(),
                    Carbon::now()->endOfWeek()
                ]);
            } elseif ($dateRange === 'month') {
                $query->whereMonth('created_at', Carbon::now()->month);
            } elseif ($dateRange === 'year') {
                $query->whereYear('created_at', Carbon::now()->year);
            }
        }
        
        $notes = $query->latest()->paginate(15);
        
        // Data untuk statistik
        $totalUsers = User::count();
        $activeUsers = Note::distinct('user_id')->count('user_id');
        
        // Hitung stats berdasarkan status
        $stats = [
            'pending' => Note::where('status', 'menunggu')->count(),
            'processing' => Note::where('status', 'diproses')->count(),
            'completed' => Note::where('status', 'selesai')->count(),
            'total' => Note::count()
        ];
        
        // Data untuk chart (contoh statis)
        $monthlyStats = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
            'data' => [12, 19, 15, 25, 22, 30, 35, 28, 32, 40, 38, 45]
        ];
        
        $categoryStats = [
            'labels' => ['Jalan Rusak', 'Penerangan', 'Sampah', 'Drainase', 'Lainnya'],
            'data' => [35, 25, 20, 15, 5]
        ];
        
        return view('admin.notes', compact(
            'notes', 
            'totalUsers',
            'activeUsers',
            'stats',
            'monthlyStats',
            'categoryStats'
        ));
    }
    
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->back()->with('success', 'Catatan berhasil dihapus!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai'
        ]);
        
        $note = Note::findOrFail($id);
        $note->status = $request->status;
        $note->save();

        return redirect()->back()->with('success', 'Status catatan berhasil diperbarui!');
    }

    public function messages($id)
{
    $note = Note::with('messages')->findOrFail($id);

    return response()->json($note->messages);
}


public function sendMessage(Request $request)
{
    $request->validate([
        'note_id' => 'required|exists:notes,id',
        'message' => 'required|string'
    ]);

    $note = Note::findOrFail($request->note_id);

    Message::create([
        'note_id' => $note->id,
        'user_id' => $note->user_id, // pemilik laporan
        'admin_id' => Auth::guard('admin')->id(),
        'message' => $request->message,
        'is_read' => false
    ]);

    return redirect()->back()->with('success', 'Pesan berhasil dikirim ke user');
}

    public function showDownload()
        {
            return view('downloadApp');
        }




    



    


    
}