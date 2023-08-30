<nav class="pagination p-6" role="navigation">
    <a class="pagination-next"
        href={{ $posts->links()->paginator->path() . '?page=' . $posts->links()->paginator->currentPage() + 1 }}>Next</a>
    <a class="pagination-previous"
        href={{ $posts->links()->paginator->path() . '?page=' . $posts->links()->paginator->currentPage() - 1 }}>Prev</a>
    <ul class="pagination-list">
        @foreach ($posts->links()->elements[0] as $key => $value)
            <li>
                <a href={{ $value }}
                    class="pagination-link {{ $posts->links()->paginator->currentPage() === $key ? 'button is-primary' : '' }}">{{ $key }}</a>
            </li>
        @endforeach
    </ul>
</nav>
</div>
</body>
<footer class="footer ">

</footer>

</html>
{{-- {{ dd($posts->links()) }} --}}
