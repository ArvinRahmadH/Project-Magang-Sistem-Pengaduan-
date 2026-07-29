
<tr>
    <td><strong>#{{ $note->id }}</strong></td>
    <td>{{ $note->user->name ?? 'Unknown' }}</td>
    <td>
        <span class="badge bg-light text-dark border">{{ $note->kategori }}</span>
    </td>
    <td>
        <div class="truncate-text" title="{{ $note->title }}">
            {{ $note->title }}
        </div>
    </td>
    <td>
        <div class="content-preview truncate-text" data-fulltext="{{ $note->content }}">
            {{ $note->content }}
        </div>
        @if(strlen($note->content) > 100)
        <button type="button" class="read-more-btn" data-bs-toggle="modal" data-bs-target="#contentModal{{ $note->id }}">
            Baca selengkapnya
        </button>
        @endif
    </td>
    <td>
        @if($note->image)
            <a href="{{ asset('uploads/' . $note->image) }}" target="_blank">
                <img src="{{ asset('uploads/' . $note->image) }}" 
                     alt="Note Image" class="note-image">
            </a>
        @else
            <span class="text-muted"><i class="bi bi-image"></i></span>
        @endif
    </td>
    <td>
        <small>{{ $note->created_at->format('d M Y') }}</small><br>
        <small class="text-muted">{{ $note->created_at->format('H:i') }}</small>
    </td>
    <td>
        @if($note->latitude && $note->longitude)
            <a href="https://www.google.com/maps?q={{ $note->latitude }},{{ $note->longitude }}" 
               target="_blank" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                <i class="bi bi-geo-alt"></i> Lihat
            </a>
        @else
            <span class="text-muted">-</span>
        @endif
    </td>
    <td>
        @if($note->status == 'menunggu')
            <span class="badge bg-warning text-dark d-flex align-items-center gap-1">
                <i class="bi bi-clock"></i> Menunggu
            </span>
        @elseif($note->status == 'diproses')
            <span class="badge bg-info d-flex align-items-center gap-1">
                <i class="bi bi-arrow-repeat"></i> Diproses
            </span>
        @else
            <span class="badge bg-success d-flex align-items-center gap-1">
                <i class="bi bi-check-circle"></i> Selesai
            </span>
        @endif
    </td>
    <td>
        <div class="action-group">
            <form action="{{ route('admin.notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus catatan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center gap-1">
                    <i class="bi bi-trash"></i> Hapus
                </button>
            </form>
            <form action="{{ route('admin.notes.updateStatus', $note->id) }}" method="POST">
                @csrf
                @method('PUT')
                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="menunggu" {{ $note->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="diproses" {{ $note->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $note->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </form>
            <button type="button" class="btn btn-sm btn-outline-info mt-1" 
                    data-bs-toggle="modal" 
                    data-bs-target="#contentModal{{ $note->id }}">
                <i class="bi bi-eye"></i> Detail
            </button>
        </div>
    </td>
</tr>

@include('admin.notes.partials.modal', ['note' => $note])