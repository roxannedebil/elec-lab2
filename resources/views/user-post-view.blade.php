<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = ($posts->currentPage() - 1) * $posts->perPage() + 1; ?>
                        @foreach ($posts as $post)                                               
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $post->title }}</td> 
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>

                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

              
                <div class="pagination">
                    {{ $posts->links() }}  
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
