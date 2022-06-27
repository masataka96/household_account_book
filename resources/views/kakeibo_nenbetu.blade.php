@extends('layouts.base')

@section('title','家計簿アプリ')

@section('h1','家計簿')



@section('データ一覧')

<header class="header_main"><div class="header_menu"><a class="tukibetu" href="http://127.0.0.1:8000/tarukame_totalling" >月別データ</a>
    <a class="mokuhyou" href="http://127.0.0.1:8000/targetamotesetting" >目標金額</a><div class="logo"> <a href="http://127.0.0.1:8000/tarukame_home"><img class="logo_pic" src="{{ asset('img/mark_yen_okaikei.png') }}" alt="ホームロゴ"></a></div>
    <a class="nyuryoku" href="http://127.0.0.1:8000/" >入力画面</a><a class="nenbetu" href="" >年別データ</a></div>
    <div class="home_name">家計簿タルカメ</div>
    </header>



<body>
 
<div class="hiduke_nenbetu">{{$seireki}}年</div>
      
    

    @if($recodes==false)

         <tr>
          <div class="Master_0"> <td>データが登録されてません</td></div>
           <?php
         



           $henkou="mypie_zero";
           $yazirusimigi_henkou="yazirusimigi_zero";
           $yazirusihidari_henkou="yazirusihidari_zero";
           $karenda="karenda_zero";
           $kensaku="kensaku_zero_nenbetu";
   ?>
         </tr>
    @endif
    @if($recodes==true)
    <?php



           $henkou="myPie";
           $yazirusimigi_henkou="yazirusimigi";
           $yazirusihidari_henkou="yazirusihidari";
           $karenda="karenda";
           $kensaku="kensaku_nenbetu";
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
  <div class="sisyutu_goukei">支出合計</div><div class="sisyutu_goukeigaku">{{number_format($sisyutgoukei->total_spending)}}円</div><div class="syunyu_goukei">収入合計</div><div class="syunyu_goukeigaku">{{number_format($syunyugoukei->total_income)}}円</div><div class="syusi">収支</div><div class="syusi_goukeigaku">{{number_format($syunyugoukei->total_income-$sisyutgoukei->total_spending)}}円</div>
   @endif

   <div class={{$henkou}}><canvas id="myPieChart1" width="3800" height="1080" class="mypie2"></canvas> </div>
  
   <form method="post" action="{{ url('data_search_seireki') }}">
   {{ csrf_field() }}
   <div class={{$karenda}}><input type="number"name="seireki"value={{$seireki}}></div>
   <div class={{$kensaku}}><input class="btn btn-secondary" type="submit" value="検索" ></div>
   </form> 
   
    <div class={{$yazirusihidari_henkou}}> <a href="{{ url('nenbetu_return',['now_seireki'=>$seireki])}}"class="left_yazirusi">←</a></div>
    <div class={{$yazirusimigi_henkou}}><a href="{{ url('nenbetu',['now_seireki'=>$seireki])}}" class="right_yazirusi">→</a></div>



    @if($recodes==true)
    <?php
   $total_sisyutu=$sisyutgoukei->total_spending;
   $sisyutu_json = json_encode($total_sisyutu);

   $total_syunyu=$syunyugoukei->total_income;
   $syunyu_json = json_encode($total_syunyu);
   ?>
@endif

@if($recodes==false)

<?php
   $total_sisyutu=0;//$sisyutgoukei->total_spending;
   $sisyutu_json = json_encode($total_sisyutu);

   $total_syunyu=0;//$syunyugoukei->total_income;
   $syunyu_json = json_encode($total_syunyu);
   ?>


@endif







  <script>

var sisyutu = JSON.parse('<?php echo $sisyutu_json; ?>');
var syunyu = JSON.parse('<?php echo $syunyu_json; ?>');
var syusi =  30
var ctx = document.getElementById("myPieChart1");
var context = ctx.getContext('2d');
context.fillRect(200,40,50,100);
var myPieChart = new Chart(ctx, {
  

type: 'doughnut',
data: {
  labels: ["支出","収入"],
  datasets: [{
      backgroundColor: [
          "#BB5179",

          "#3C00FF"
      ],
      data: [sisyutu, syunyu]
  }]
},
options: {
  title: {
    display: true,
    text: '収入と支出の割合'
  }
}

});
</script>
   </table>
   @endsection
  
   </body>
   </form>