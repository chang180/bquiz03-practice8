<?php
@$name = $Movie->find($_GET['id'])['name'] ?? "";
?>
<form id="order-form">
    <h1 class="ct">線上訂票</h1>
    電影：<select name="name" id="name">
        <?php
        $today = date("Y-m-d");
        $ondate = date("Y-m-d", strtotime("$today -2 days"));

        $movies = $Movie->all(['sh' => 1], " && date>='$ondate' && date <= '$today' ");
        foreach ($movies as $m) {
            $chk = ($m['name'] == $name) ? "selected" : "";
            echo "<option $chk>" . $m['name'] . "</option>";
        }
        ?>
    </select><br>
    日期：<select name="date" id="date"><option>2020-08-24</option><option>2020-08-25</option><option>2020-08-26</option></select><br>
    場次：<select name="session" id="session">
<?php
for($i=1;$i<=5;$i++){
    echo "<option value='$session[$i]'>$session[$i] 剩餘座位20</option>";
}
?>
    </select><br>
    <div class="ct"><button type="button" onclick="booking()">確定</button><button type="reset">重置</button></div>
</form>
<div id="seat-form" style="display:none">
    <div id="seat"></div>
    <div>
        <div>您選擇的電影是：<span id="mName"></span> </div><br>
        <div>您選擇的時刻是：<span id="mDate"></span>&nbsp;<span id="mSession"></span></div><br>
        <div>您已經勾選了<span id="mTicket">0</span>張票，最多可以購買4張票</div><br>
        <button onclick="prev()">回上一步</button><button onclick="send()">完成訂票</button>
    </div>
</div>
<script>
    let name,date,session,seat=[],ticket=0;
function send(){
    $.post("api/order.php",{name,date,session,seat},function(no){
        location.href=`?do=result&no=${no}`;
    })
}

    function booking(){
        $("#order-form,#seat-form").toggle();
name=$("#name").val();
date=$("#date").val();
session=$("#session").val();
$("#mName").text(name);
$("#mDate").text(date);
$("#mSession").text(session);
$.post("api/getseat.php",{name,date,session},function(res){
    $("#seat").html(res);
    $(".seat").on("change",function(){
        if(this.checked){
            if(ticket > 3) this.checked=false;
            else{
                ticket++;
                seat.push(this.value);
            }
        }else{
            ticket--;
            seat.splice(seat.indexOf(this.value),"1");
        }
        $("#mTicket").text(ticket);
    })
})
    }
    function prev(){
        $("#order-form,#seat-form").toggle();
        $("#seat").html("");
    }
    // getdate()
    // $("#name").on("change",function(){
    //     $.post("api/getdate.php",{"name":$("#name").val()},function(res){
    //         $("#date").html(res);
    //     })
    // })
</script>