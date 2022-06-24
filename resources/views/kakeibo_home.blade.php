@extends('layouts.base')

@section('title','家計簿アプリ')

@section('h1','家計簿')



@section('データ一覧')

<header class="header_main"><div class="header_menu"><a class="tukibetu" href="http://127.0.0.1:8000/tarukame_totalling" >月別データ</a>
    <a class="mokuhyou" href="http://127.0.0.1:8000/targetamotesetting" >目標金額</a><div class="logo"> <a href=""><img class="logo_pic" src="{{ asset('img/mark_yen_okaikei.png') }}" alt="ホームロゴ"></a></div>
    <a class="nyuryoku" href="http://127.0.0.1:8000/" >入力画面</a></div>
    <div class="home_name">家計簿タルカメ</div>
    </header>



<body>
 
<div class="hiduke">{{$seireki}}年{{$tuki}}月</div>


    


    @if($recodes==false)

         <tr>
         <?php
   
   $henkou="mypie_zero";
   $yazirusimigi_henkou="yazirusimigi_zero";
   $yazirusihidari_henkou="yazirusihidari_zero";
   $karenda="karenda_zero";
   $kensaku="kensaku_zero";
?>
         </tr>
    @endif
    @if($recodes==true)
    <?php
           $henkou="myPie";
           $yazirusimigi_henkou="yazirusimigi";
           $yazirusihidari_henkou="yazirusihidari";
           $karenda="karenda";
           $kensaku="kensaku";
   ?>
    @foreach ($recodes as $syuturyoku)
    @foreach ($sisyutusum as $sisyutgoukei)
    @foreach ($syunyusum as $syunyugoukei)
    @method('delete')
        
    {{ csrf_field() }}
    
    <tr>
    
   </tr>
   @endforeach
   @endforeach
   @endforeach
   
   
  <div class="Balance_column"> </div>
  <div class="sisyutu_goukei">支出合計</div><div class="sisyutu_goukeigaku">{{number_format($sisyutgoukei->total_amount)}}円</div><div class="syunyu_goukei">収入合計</div><div class="syunyu_goukeigaku">{{number_format($syunyugoukei->total_amount)}}円</div><div class="syusi">収支</div><div class="syusi_goukeigaku">{{number_format($syunyugoukei->total_amount-$sisyutgoukei->total_amount)}}円</div>
   @endif

   <div class={{$henkou}}><canvas id="myPieChart1" width="3800" height="1080" class="mypie2"></canvas> </div>
  
   
    



   <?php
   //$param=$sisyutgoukei->total_genre;
   //$param_json = json_encode($param);
   ?>

   




  <script>

var sisyutu = 10
var syunyu = 20
var syusi =  30
var ctx = document.getElementById("myPieChart1");
var context = ctx.getContext('2d');
context.fillRect(200,40,50,100);
var myPieChart = new Chart(ctx, {
  

type: 'doughnut',
data: {
  labels: ["給料","おこづかい","賞与","副業","投資","その他"],
  datasets: [{
      backgroundColor: [
          "#BB5179",
          "#FAFF67",
          "#58A27C",
          "#000000",
          "#0000FF",
          "#3C00FF"
      ],
      data: [sisyutu, syunyu, syusi, 1,5,8]
  }]
},
options: {
  title: {
    display: true,
    text: '収入 割合'
  }
}

});
</script>
   </table>
   @endsection
  
   </body>
   </form>