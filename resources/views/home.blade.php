 @switch(Auth::user()->type)
        @case('user'):
        <script>window.location = "/user"</script>
        @break
        @case('admin'):
        <script>window.location = "/admin"</script>
        @break
        @case('tech'):
        <script>window.location = "/tech"</script>
        @break
    @endswitch

