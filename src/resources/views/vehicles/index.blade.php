<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicles - ByeCar</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<script defer>
  function openModal(url) {
    const modal = document.getElementById('modal');
    const close = document.getElementById('modal-close');

    modal.classList.remove('hidden');

    close.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    const regex = /name=([^&]+)&fipe_code=([^&]+)&price=([^&]+)/;

    const matches = url.match(regex);

    if (matches) {
      const nameValue = decodeURIComponent(matches[1]);
      const fipeCodeValue = matches[2];
      const priceValue = matches[3];

      const nameInput = document.querySelector('#modal input[name="name"]');
      const fipeCodeInput = document.querySelector('#modal input[name="fipe_code"]');
      const priceInput = document.querySelector('#modal input[name="price"]');
      const form = document.querySelector('#modal form');

      nameInput.value = nameValue;
      fipeCodeInput.value = fipeCodeValue;
      priceInput.value = priceValue;
      form.action = url;
    }
  }
</script>

<style>
  :root {
    --theme-color-primary: #004151;
    --theme-color-primary-light: #00415115;
    --theme-color-primary-dark: #004151AA;

    --theme-color-secondary: #2DCCD3;
    --theme-color-secondary-light: #2DCCD355;
    --theme-color-primary-dark: #004151DD;
  }

  .font-merienda {
    font-family: "Merienda", cursive;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
  }

  @keyframes out {
    0% {
      transform: translateX(0);
    }

    20% {
      transform: translateX(-10%);
    }

    100% {
      transform: translateX(120%);
    }
  }

  @keyframes enter {
    0% {
      transform: translateX(120%);
    }

    100% {
      transform: translateX(0);
    }
  }

  @keyframes decrease {
    0% {
      width: 100%;
    }

    100% {
      width: 0%;
    }
  }

  .animation-enter-out {
    animation: enter 1.5s ease forwards, out 1.5s ease forwards 3s;
  }

  .animation-decrease {
    animation: decrease 2.5s linear forwards 1s;
  }
</style>

<body class="bg-gray-100 text-gray-900 font-merienda">
  @include('flash-message')
  @include('modal')
  <div class="container mx-auto px-4 py-8 space-y-8">
    <div class="text-3xl font-bold mb-6 text-[var(--theme-color-primary)] flex flex-col w-max">
      <svg class="size-12 stroke-[var(--theme-color-secondary)] -mb-6 -ml-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-car">
        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2" />
        <circle cx="7" cy="17" r="2" />
        <path d="M9 17h6" />
        <circle cx="17" cy="17" r="2" />
      </svg>
      <span>Vehicles</span>
      <h1 class="text-xs text-right text-[var(--theme-color-secondary)] -mt-1">Byecar</h1>
    </div>
    <table class="w-full">
      <thead>
        <tr class="*:text-left *:text-[var(--theme-color-primary)]">
          <th>ID</th>
          <th>Name</th>
          <th>FIPE Code</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if (count($vehicles) === 0)
        <tr>
          <td colspan="5" class="text-center text-[var(--theme-color-primary)] pt-4">No vehicles found</td>
        </tr>
        @endif

        @foreach($vehicles as $vehicle)
        <tr class="even:bg-[var(--theme-color-primary-light)] hover:bg-[var(--theme-color-secondary-light)] cursor-pointer transition-colors duration-100 *:py-2">
          <td class="flex items-center justify-start gap-2 pl-2">
            <svg class="stroke-[var(--theme-color-primary)]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-key-square">
              <path d="M12.4 2.7c.9-.9 2.5-.9 3.4 0l5.5 5.5c.9.9.9 2.5 0 3.4l-3.7 3.7c-.9.9-2.5.9-3.4 0L8.7 9.8c-.9-.9-.9-2.5 0-3.4Z" />
              <path d="m14 7 3 3" />
              <path d="M9.4 10.6 2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4" />
            </svg>
            <span>{{ $vehicle["id"] }}</span>
          </td>
          <td>{{ $vehicle["name"] }}</td>
          <td>{{ $vehicle["fipe_code"] }}</td>
          <?php $formatted_price = number_format($vehicle["price"], 2, ',', '.'); ?>
          <td>R$ {{ $formatted_price }}</td>
          <td class="flex items-center justify-center gap-1">
            <?php $url = route('vehicles.update', $vehicle); ?>
            <button title="edit" onclick="openModal('{{$url}}')" class="stroke-[var(--theme-color-primary)] hover:text-[var(--theme-color-secondary)] mr-2 active:scale-90 transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-ruler">
                <path d="m15 5 4 4" />
                <path d="M13 7 8.7 2.7a2.41 2.41 0 0 0-3.4 0L2.7 5.3a2.41 2.41 0 0 0 0 3.4L7 13" />
                <path d="m8 6 2-2" />
                <path d="m2 22 5.5-1.5L21.17 6.83a2.82 2.82 0 0 0-4-4L3.5 16.5Z" />
                <path d="m18 16 2-2" />
                <path d="m17 11 4.3 4.3c.94.94.94 2.46 0 3.4l-2.6 2.6c-.94.94-2.46.94-3.4 0L11 17" />
              </svg>
            </button>
            <form action="{{ route('vehicles.delete', $vehicle['id']) }}" method="POST">
              @csrf
              @method('DELETE')
              <button title="delete" class="text-red-500 hover:text-[var(--theme-color-primary)] flex items-center justify-center gap-2 active:scale-90 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                  <path d="M3 6h18" />
                  <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                  <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                  <line x1="10" x2="10" y1="11" y2="17" />
                  <line x1="14" x2="14" y1="11" y2="17" />
                </svg>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>