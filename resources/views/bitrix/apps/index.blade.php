@if($result['rest_only'])
    <head>
        <script src="//api.bitrix24.com/api/v1/"></script>
            @if($result['install'])
            <script>
                const bx = BX24;
                bx.init(function () {
                    BX24.installFinish();
                });
                console.log(bx);
            </script>
            <title>Main Bitrix app</title>
        @endif
    </head>
    <body>
    @dump($result);
        @if($result['install'])
            installation has been finished
        @else
            installation error
        @endif
    </body>
@endif
