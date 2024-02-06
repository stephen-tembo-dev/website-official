<div>
    <div class="container">
        <div class="mt">
            <form wire:submit.prevent="search">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" wire:model.live.debounce.500ms="search" class="validate">
                        {{-- <label for="search">Search</label> --}}
                    </div>
                </div>
                <div>

                </div>
            </form>
        </div>

        <table class="highlight striped responsive-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year</th>
                    <th>URL</th>
                    <th>Created at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (count($publications) > 0)
                    @foreach ($publications as $index => $publication)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ str()->limit($publication->title, 75) ?? 'N/A' }}</td>
                            <td>{{ $publication->author ?? 'N/A' }}</td>
                            <td>{{ $publication->year ?? 'N/A' }}</td>
                            <td><a target="_blank" href="{{ $publication->url ?? '#' }}">Publication link</a></td>
                            </td>
                            <td>{{ $publication->created_at->format('d M Y H:i') ?? 'N/A' }}</td>
                            @can('editor')
                                <td>
                                    <a href="{{ route('publications.edit', $publication->id) }}"
                                        class="btn btn-floating btn-small white">
                                        <i class="material-icons black-text">edit</i>
                                    </a>
                                    @if ($index === 1)
                                        <a href="{{ route('publications.create') }}"
                                            class="btn btn-floating btn-small white">
                                            <i class="material-icons black-text">add</i>
                                        </a>
                                    @endif
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>#</td>
                        <td>Placeholder title</td>
                        <td>Placeholder author name</td>
                        <td>{{ now()->format('Y') }}</td>
                        <td>https://placeholder-url.com</td>
                        </td>
                        <td>{{ now()->format('d M Y H:i') }}</td>
                        @can('editor')
                            <td>
                                <a href="{{ route('publications.create') }}" class="btn btn-floating btn-small white">
                                    <i class="material-icons black-text">add</i>
                                </a>
                            </td>
                        @endcan
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mt-sm center-align">
            {{ $publications->links() }}
        </div>
    </div>
</div>
