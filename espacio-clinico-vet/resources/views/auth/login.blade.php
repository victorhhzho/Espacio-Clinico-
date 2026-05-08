<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <title>Iniciar Sesión</title>
  </head>

  <body class="font-[Poppin bg-cyan-100">
    <section class="bg-gray-5">
      @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
          <i class="bi bi-x-circle-fill fa-lg" style="color: red"></i>
          {{ Session::get('error') }}
        </div>
      @endif
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
          <div class="p-2.5 mt-1 flex items-center rounded-md pb-10">
            <i class="fa-solid fa-shield-dog fa-4x" style="color: #037171" ></i>

            <h1 class="ml-3 text-4xl text-[#009F93] font-bold">Espacio </h1>
            <h1 class="ml-3 text-4xl text-gray-500 font-bold">Clinico</h1>
          </div>
            <div class="w-full bg-[#009F93] rounded-lg shadow md:mt-0 sm:max-w-md xl:p-4">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-2xl font-bold leading-tight text-center tracking-tight text-white md:text-2xl">
                        Iniciar Sesión
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                      @csrf  
                        <div>
                            <label for="email" class="block mb-2 text-base font-medium text-white">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#009F93] focus:border-[#009F93] block w-full p-2.5" placeholder="nombre@ejemplo.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-base font-medium text-white">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" required="">
                        </div>
                        <button type="submit" class="w-full text-white bg-[#037171bb] hover:bg-[#037171] focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-cente">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </body>
</html>