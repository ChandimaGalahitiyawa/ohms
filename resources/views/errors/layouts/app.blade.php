
<!DOCTYPE html>
<html lang="en">
   @include('errors.includes.header')

  <body class="m-0 font-sans antialiased font-normal text-left bg-white leading-default text-base dark:bg-slate-950 text-slate-500 dark:text-white/80">

    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
    @yield('content')
    </main>
  </body>
   @include('errors.includes.footerlinks')

</html>
