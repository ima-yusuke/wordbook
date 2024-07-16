<x-template title="単語帳">

    {{--メインパート--}}
    <div class="flex flex-col justify-center items-center gap-6 min-h-full h-auto">

        @if(isset($data))
            <p class="text-4xl font-bold">{{count($data)}}件</p>
            <div class="flex flex-col items-center justify-center md:flex-row md:flex-wrap gap-6">
                @foreach($data as $key=>$value)
                    <div class="card card-skin">
                        <div class="card__imgframe h-[200px] bg-gray-300 flex flex-col items-center justify-center gap-4">
                            <p class="rounded-full border border-solid border-black w-6 h-6 flex items-center justify-center">{{$value["id"]}}</p>
                            @if(count($value["category"]) > 1)
                                @php
                                    $tmp = implode("・", $value["category"]);
                                @endphp
                                <p class="text-xl">【 {{ $tmp }} 】</p>
                            @else
                                <p class="text-xl">【 {{ $value["category"][0] }} 】</p>
                            @endif

                            <aside class="flex flex-col gap-1">
                                <p class="text-4xl">{{ $value["en"] }}</p>
                            </aside>
                        </div>

                        <div class="card__textbox">
                            <div class="text-xl flex flex-col gap-1">
                                @foreach($value["ja"] as $idx=>$ja)
                                    <p class="px-1">・{{$ja}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-template>


