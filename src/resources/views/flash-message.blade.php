@if ($message = Session::get("success"))
<div role="alert" class="animation-enter-out fixed bottom-0 right-0 p-4 mb-4 mr-4 bg-green-500 text-white rounded shadow-md">
  <div class=" flex items-center justify-center gap-4">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle">
      <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
      <path d="m9 11 3 3L22 4" />
    </svg>
    {{ $message }}
  </div>
  <div role="progressbar" class="animation-decrease w-full h-1 bg-white mt-3"></div>
</div>
@elseif ($message = Session::get("error"))
<div role="alert" class="animation-enter-out fixed bottom-0 right-0 p-4 mb-4 mr-4 bg-red-500 text-white rounded shadow-md">
  <div class=" flex items-center justify-center gap-4">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-circle">
      <circle cx="12" cy="12" r="10" />
      <path d="m15 9-6 6" />
      <path d="m9 9 6 6" />
    </svg>
    {{ $message }}
  </div>
  <div role="progressbar" class="animation-decrease w-full h-1 bg-white mt-3"></div>
</div>
@endif