


@if ($paginator->hasPages())
<nav class="flexbox mt-30">

@if ($paginator->onFirstPage())
<a class="btn btn-white disabled"><i class="mr-4 ti-arrow-left fs-9"></i> Previous</a>
@else

<a href="{{ $paginator->previousPageUrl() }}" class="btn btn-white "><i class="mr-4 ti-arrow-left fs-9"></i> Previous</a>

@endif

@if ($paginator->hasMorePages())
<a class="btn btn-white" href="{{ $paginator->nextPageUrl() }}">Next <i class="ml-4 ti-arrow-right fs-9"></i></a>

@else
<a class="btn btn-white disabled">Next <i class="ml-4 ti-arrow-right fs-9"></i></a>

@endif
  </nav>


@endif

