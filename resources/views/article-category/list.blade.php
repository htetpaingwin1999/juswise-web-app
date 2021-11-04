<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Controls</th>
            <th>Created_at</th>
        </tr>
    </thead>

    <tbody>
    @foreach (App\ArticleCategory::with('user')->get() as  $articleCategory)
            <tr>
                <td>{{  $articleCategory->id }}</td>
                <td>{{  $articleCategory->title }}</td>
                <td>{{  $articleCategory->user->name }}</td>
                <td>
                    <a href="{{ route('article-category.edit',  $articleCategory->id) }}" class="btn btn-sm btn-outline-success">
                        Edit
                    </a>

                    <form action="{{ route('article-category.destroy',  $articleCategory->id) }}" method="post" class="d-inline-block" id="form{{  $articleCategory->id }}">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="return askArtiCateConfirm({{  $articleCategory->id }})">Delete</button>
                    </form>
                </td>
                <td>
                    <span class="small">
                        <i class="feather-calendar"></i>
                        {{  $articleCategory->created_at->format("d-m-Y") }}
                    </span>
                    <br>
                    <span class="small">
                        <i class="feather-clock"></i>
                        {{  $articleCategory->created_at->format("h:i A") }}
                    </span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>