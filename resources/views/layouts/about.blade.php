@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container mx-auto px-6 lg:px-20">
        <h2 class="text-4xl font-bold text-center text-black-700 my-8">About Us</h2>
        <p class="mt-4 text-base text-gray-500 text-center mb-8">Makna hidup adalah tentang memahami dan menerima kenyataan hidup sebagaimana adanya, sambil terus mencari alasan untuk melangkah maju. Ia bukan sekadar pencarian kebahagiaan, tetapi keberanian untuk menghadapi kenyataan pahit dan manis dengan kepala tegak. Hidup memiliki nilai ketika kita mampu menciptakan arti dari pengalaman yang kita jalani—baik itu dengan membangun hubungan bermakna, menghadapi tantangan dengan integritas, atau meninggalkan sesuatu yang lebih baik dari yang kita temukan.Hidup bukan tentang mengejar kesempurnaan, tetapi tentang menemukan keseimbangan: menerima kekurangan tanpa menyerah pada perbaikan, menikmati kebahagiaan tanpa melupakan tanggung jawab, dan berjuang untuk tujuan tanpa kehilangan diri. Makna hidup ada pada perjalanan itu sendiri, bukan pada satu tujuan akhir.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Team Member 1 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <img src="{{ asset('images/nuzu.jpeg') }}" alt="Your Photo" class="w-72 h-80 rounded-lg mx-auto mb-4">
                <h3 class="text-lg font-semibold text-blue-700">Nuzurwan Patri Arja</h3>
                <p class="text-gray-700 text-sm mt-2">Back-End Engineering / All Task</p>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
            <img src="{{ asset('images/fauzi.jpeg') }}" alt="Your Photo" class="w-72 h-80 rounded-lg mx-auto mb-4">
                <h3 class="text-lg font-semibold text-blue-700">Fauziyyah Annisah</h3>
                <p class="text-gray-700 text-sm mt-2">Data Analyst / All Task</p>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
            <img src="{{ asset('images/nuzu.jpg') }}" alt="Your Photo" class="w-72 h-80 rounded-lg mx-auto mb-4">
                <h3 class="text-lg font-semibold text-blue-700">Haniefa Aulia Rahma</h3>
                <p class="text-gray-700 text-sm mt-2">Data Analyst / All Task</p>
            </div>

        </div>
    </div>
@endsection