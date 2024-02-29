<div id="modal" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-90 transition-opacity"></div>
  <div class="fixed inset-0 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative transform overflow-hidden rounded-lg bg-gray-100 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <form action="" method="POST">
          <h1 class="text-xl font-bold mb-6 p-4 text-[var(--theme-color-primary)]">Edit Vehicle</h1>
          @csrf
          @method('PATCH')
          <div class="mb-4 px-4">
            <label for="name" class="block mb-2">Name</label>
            <input type="text" id="name" name="name" maxlength="150" value="" class="w-full bg-gray-200 border border-gray-400 text-gray-700 rounded px-3 py-2 focus:outline-none focus:border-[var(--theme-color-secondary)]">
          </div>
          <div class="mb-4 px-4">
            <label for="fipe_code" class="block mb-2">FIPE Code</label>
            <input type="text" id="fipe_code" name="fipe_code" maxlength="15" value="" class="w-full bg-gray-200 border border-gray-400 text-gray-700 rounded px-3 py-2 focus:outline-none focus:border-[var(--theme-color-secondary)]">
          </div>
          <div class="mb-4 px-4">
            <label for="price" class="block mb-2">Price</label>
            <div class="relative">
              <input type="text" id="price" name="price" value="" class="w-full bg-gray-200 border border-gray-400 text-gray-700 rounded px-3 py-2 focus:outline-none focus:border-[var(--theme-color-secondary)] pl-11">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                <span class="text-gray-700">R$</span>
              </div>
            </div>
          </div>
          <div class="py-3 sm:flex sm:flex-row sm:px-6 w-full flex items-center justify-end gap-4">
            <button type="submit" class="flex-1 mt-3 inline-flex w-full justify-center rounded-md bg-[var(--theme-color-primary)] px-3 py-2 text-sm font-semibold text-gray-100 shadow-sm ring-1 ring-inset ring-gray-600 hover:bg-[var(--theme-color-primary-dark)] sm:mt-0 sm:w-auto active:scale-95 transition-all duration-300">Update</button>
            <button type="button" id="modal-close" class="mt-3 inline-flex w-full justify-center rounded-md bg-gray-200 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-600 hover:bg-gray-300 sm:mt-0 sm:w-auto active:scale-95 transition-all duration-300">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>