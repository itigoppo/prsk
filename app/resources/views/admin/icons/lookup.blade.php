@php
    /**
     * @var \App\Models\Icon[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $icons
     */
@endphp


<div class="row">
    @foreach($icons as $icon)
        <div class="col-sm-3 my-2">
            <div class="card">
                <div class="card-body">
                    <img src="{{ route('admin.icons.display', ['icon_id' => $icon->id]) }}" class="img-thumbnail">
                    <p class="card-text">
                        ID: {{ $icon->id }}
                        {{ ($icon->label) ?? '' }}
                    </p>
                </div>
                <div class="card-footer text-center">

                    <a href="{{ route('admin.icons.delete', ['icon_id' => $icon->id]) }}"
                       class="btn btn-sm btn-outline-danger"
                       onclick="event.preventDefault();document.getElementById('delete-form-{{ $icon->id }}').submit();">
                        削除
                    </a>

                    <form id="delete-form-{{ $icon->id }}"
                          action="{{ route('admin.icons.delete', ['icon_id' => $icon->id]) }}"
                          method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $icons->links() }}
