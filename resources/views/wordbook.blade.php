<x-template title="単語帳">

    {{--メインパート--}}
    <div class="flex flex-col justify-center items-center gap-6 min-h-full h-auto">

        @if(isset($data))
            <p class="text-4xl font-bold">{{count($data)}}件</p>
            <form action="{{route('search_category')}}" method="post" id="search-form">
                @csrf
                <select name="category" id="category-select" class="text-2xl">
                    <option>カテゴリーを選択してください</option>
                    @foreach($addressOptions as $value)
                        <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                </select>
            </form>
            <div class="flex flex-col items-center justify-center md:flex-row md:flex-wrap gap-6">
                @foreach($data as $key=>$value)
                    <div class="w-[90%] card-skin">
                        <div class="card__imgframe bg-gray-300 flex flex-col items-center justify-center gap-4 py-4">
                            <p class="rounded-full border border-solid border-black w-8 h-8 flex items-center justify-center">{{$value["id"]}}</p>
                            @if(count($value["category"]) > 1)
                                @php
                                    $tmp = implode("・", $value["category"]);
                                @endphp
                                <p class="text-base ">【 {{ $tmp }} 】</p>
                            @else
                                <p class="text-base">【 {{ $value["category"][0] }} 】</p>
                            @endif

                            <aside class="flex flex-col gap-1">
                                <p class="text-xl">{{ $value["en"] }}</p>
                            </aside>
                        </div>

                        <div class="card__textbox">
                            <div class="flex flex-col gap-2">
                                @foreach($value["ja"] as $idx=>$ja)
                                    <p class="px-1 text-base">・{{$ja}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-template>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category-select');

        // セレクトボックスが変更されたときのイベントリスナーを追加
        categorySelect.addEventListener('change', function() {
            // フォームを送信
            document.getElementById('search-form').submit();
        });
    });
</script>


