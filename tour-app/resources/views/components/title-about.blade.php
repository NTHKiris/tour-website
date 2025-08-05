@props(['smtitle' => '', 'lgtitle' => ''])

<div class="w-[70%] mx-auto mt-[100px]">
    <div class="flex flex-col">
        <div class="w-full text-center text-black font-[Jost] text-[12px] font-semibold uppercase leading-[16px] mb-[40px]">
            {{ $smtitle }}
        </div>
        <h2 class="title-main text-[40px] leading-[45px]">
            {{ $lgtitle }}
        </h2>
        <div class="m-[15px] py-[45px]">
            <span class="block border-t border-sky-500 w-[80px] mx-auto"></span>
        </div>
    </div>
</div>
