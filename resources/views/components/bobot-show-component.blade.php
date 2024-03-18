<div class="card mt-5">
    <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kriteria</th>
                    @foreach($gmm_criteria as $index => $criteria)
                    <th>{{ $index }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <!-- idnex sould be [$index, $_index] -->
                @php
                $indexing = 0
                @endphp

                @foreach($gmm_criteria as $index => $criteria)
                <tr>
                    <td>{{ $index }}</td>

                    @foreach($criteria as $_index => $_criteria)
                    <td>{{ $bobot->firstWhere('id_kriteria', $_criteria->id)?->bobot }}</td>
                    @endforeach

                    @php
                    $indexing = $indexing + 1
                    @endphp

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if($user_id == request()->user()->id)
    <hr class="dropdown-divider" />
    <div class="card-footer text-body-secondary">
        <form action="{{ route('Bobot::destroy', $token) }}" method="post" class="d-inline" id="deleteForm{{ $token }}">
            @csrf
            @method('DELETE')
            <button type="button" name="delete" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="<span>Delete</span>" onclick="showDeleteConfirmationModal('{{ $token }}')">
                <i class="bx bx-trash me-1"></i>
            </button>
        </form>
    </div>
    @endif
</div>
