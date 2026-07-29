<div class="modal fade" id="contentModal{{ $note->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            {{-- HEADER --}}
            <div class="modal-header">
                <h5 class="modal-title">Detail Pengaduan #{{ $note->id }}</h5>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>

            {{-- BODY --}}
            <div class="modal-body">

                {{-- DETAIL LAPORAN --}}
                <h6>{{ $note->title }}</h6>
                <p class="text-muted mb-3">
                    <i class="bi bi-person"></i> {{ $note->user->name ?? 'Unknown' }} • 
                    <i class="bi bi-calendar"></i> {{ $note->created_at->format('d F Y H:i') }} • 
                    <span class="badge bg-primary">{{ $note->kategori }}</span>
                </p>

                <div class="mb-3">
                    {!! nl2br(e($note->content)) !!}
                </div>

                @if($note->image)
                <img src="{{ asset('uploads/' . $note->image) }}"
                     class="img-fluid rounded mb-3"
                     style="max-height: 280px;">
                @endif

                @if($note->latitude && $note->longitude)
                <a href="https://www.google.com/maps?q={{ $note->latitude }},{{ $note->longitude }}"
                   target="_blank" class="btn btn-outline-primary btn-sm mb-4">
                    <i class="bi bi-geo-alt"></i> Lihat Lokasi
                </a>
                @endif

                <hr>

                {{-- RIWAYAT CHAT --}}
                <h6 class="mb-2">Riwayat Chat</h6>

                <div class="border rounded p-3 mb-3"
                     style="max-height: 260px; overflow-y: auto; background:#f8f9fa">

                    @forelse($note->messages as $msg)

                        {{-- ADMIN --}}
                        @if($msg->admin_id)
                        <div class="d-flex justify-content-end mb-3">
                            <div class="text-end">
                                <small class="text-muted">Admin</small>
                                <div class="chat-bubble admin">
                                    {{ $msg->message }}
                                </div>
                                <small class="text-muted">
                                    {{ $msg->created_at->format('d M Y H:i') }}
                                </small>
                            </div>
                        </div>
                        @endif

                        {{-- USER --}}
                        @if($msg->user_id && !$msg->admin_id)
                        <div class="d-flex justify-content-start mb-3">
                            <div>
                                <small class="text-muted">User</small>
                                <div class="chat-bubble user">
                                    {{ $msg->message }}
                                </div>
                                <small class="text-muted">
                                    {{ $msg->created_at->format('d M Y H:i') }}
                                </small>
                            </div>
                        </div>
                        @endif

                    @empty
                        <p class="text-muted text-center">Belum ada percakapan</p>
                    @endforelse
                </div>

                {{-- INPUT CHAT --}}
                <form action="{{ url('/admin/messages') }}" method="POST">
                    @csrf
                    <input type="hidden" name="note_id" value="{{ $note->id }}">

                    <div class="input-group">
                        <textarea name="message"
                                  class="form-control"
                                  rows="2"
                                  placeholder="Tulis pesan ke pelapor..."
                                  required></textarea>
                        <button class="btn btn-primary">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                </form>

            </div>

            {{-- FOOTER --}}
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary btn-sm"
                        data-bs-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>

<style>

    .chat-bubble {
    max-width: 75%;
    padding: 10px 14px;
    border-radius: 16px;
    font-size: 14px;
    line-height: 1.4;
    margin-top: 4px;
}

.chat-bubble.admin {
    background: #0d6efd;
    color: #fff;
    border-bottom-right-radius: 4px;
}

.chat-bubble.user {
    background: #ffffff;
    border: 1px solid #dee2e6;
    border-bottom-left-radius: 4px;
}

</style>