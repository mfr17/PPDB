<x-layout>
    @section('pengumuman')
        @if ($data[0]->tahun_pendaftaran == 1)
            <div class="bg-blue-600 px-4 py-3 text-white">
                <p class="text-center text-sm font-medium">
                    PPDB {{ $data[0]->tahun_ajaran }} Telah Dibuka
                    <a href="{{ route('students.create') }}" class="inline-block underline">Daftar Sekarang!</a>
                </p>
            </div>
        @else
        @endif
    @endsection
    @section('main')
        <section id="tentang">
            <div class="p-8 md:p-12 lg:px-16 lg:py-24">
                <div class="mx-auto max-w-lg text-center">
                    <h2 class="text-2xl uppercase font-bold text-gray-900 md:text-3xl">
                        Prosedur PPDB Online
                    </h2>

                    <p class="hidden text-gray-500 sm:mt-4 sm:block">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae dolor officia blanditiis
                        repellat in, vero, aperiam porro ipsum laboriosam consequuntur exercitationem incidunt
                        tempora nisi?
                    </p>
                    <p class="hidden text-gray-500 sm:mt-4 sm:block">
                        @if ($data[0]->tahun_pendaftaran == 1)
                            <a href="{{ route('students.create') }}"
                                class="mt-8 inline-block rounded bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-700 focus:outline-none focus:ring focus:ring-yellow-400">
                                Daftar </a>
                        @else
                            <a href="#"
                                class="mt-8 inline-block rounded bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-700 focus:outline-none focus:ring focus:ring-yellow-400">
                                Pendaftaran Telah Ditutup </a>
                        @endif
                    </p>
                </div>
            </div>
        </section>
    @endsection
    @section('tentang')
        <section id="tentang">
            <div class="p-8 md:p-12 lg:px-16 lg:py-24">
                <div class="mx-auto max-w-lg text-center">
                    <h2 class="text-2xl uppercase font-bold text-gray-900 md:text-3xl">
                        Tentang Sekolah
                    </h2>

                    <p class="hidden text-gray-500 sm:mt-4 sm:block">
                        <a href="https://smkn1sebulu.sch.id"
                            class="mt-8 inline-block rounded bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-700 focus:outline-none focus:ring focus:ring-yellow-400">
                            SMK Negeri 1 Sebulu </a>
                    </p>
                </div>


            </div>
        </section>
    @endsection
    @section('kontak')
        <div id="kontak" class="bg-white lg:grid lg:grid-cols-5">
            <div class="relative block h-32 lg:col-span-3 lg:h-full">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.773236073927!2d117.00418287582221!3d-0.272379235360183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df672b6520658d1%3A0x5a91cfeb9d001248!2sSMK%20Negeri%201%20Sebulu!5e0!3m2!1sid!2sid!4v1715154236510!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="absolute inset-0 h-full w-full object-cover"></iframe>
            </div>

            <div class="px-4 py-16 sm:px-6 lg:col-span-2 lg:px-8">
                <div class="text-center">
                    <p>
                        <span class="text-3xl font-medium uppercase tracking-wide text-gray-500"> Kontak Kami </span>
                    </p>

                    <ul class="mt-2 space-y-1 text-sm text-gray-700">
                        <li class="text-md text-gray-900 hover:opacity-75 sm:text-md">Telepon : <a href="tel:05416721099">
                                (0541) 6721099
                            </a></li>
                        <li class="text-md text-gray-900 hover:opacity-75 sm:text-md">Email : <a href="tel:05416721099">
                                smkn1sbl@gmail.com
                            </a></li>
                        <li class="text-md text-gray-900 hover:opacity-75 sm:text-md">Website : <a
                                href="https://smkn1sebulu.sch.id">
                                SMK Negeri 1 Sebulu
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endsection
</x-layout>
