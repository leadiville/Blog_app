{{-- {{ dd($posts->links()) }} --}}
<nav class="pagination" role="navigation" aria-label="pagination">
    <a class="pagination-previous"
        href="{{ $posts->links()->paginator->path() . '?page=' . $posts->links()->paginator->currentPage() - 1 }}">Previous</a>
    <a class="pagination-next"
        href="{{ $posts->links()->paginator->path() . '?page=' . $posts->links()->paginator->currentPage() + 1 }}">Next
        page</a>
    <ul class="pagination-list">
        @foreach ($posts->links()->elements[0] as $key => $value)
            <li>
                <a href="{{ $value }}" aria-current="page"
                    class="pagination-link {{ $key === $posts->links()->paginator->currentPage() ? 'button is-primary ' : '' }}"
                    aria-label="Goto page {{ $key }}">{{ $key }}</a>
            </li>
        @endforeach
    </ul>
</nav>
</div>
</body>
<footer class="footer ">

</footer>

</html> 
