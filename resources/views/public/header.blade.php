<div id="container">

<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
<div id="globalHeader">
<ul id="top_nav_ul">
  <div id=navigation1_03 style=" float:right;">
  <DL>
  <DT style="POSITION: relative; z-index:999999999">

  <A style="float:right; background:url({{asset('themes')}}/jindong/images/biao.gif) 55px center no-repeat; padding-right:23px;display:block; line-height:29px;"  class=alk
  onmouseover="show_menu('float_menu2','c_fship_c')"
  onmouseout="hide_menu('float_menu2','c_fship_c')"
  href="#"  target=_self>客服中心</A>

  <DIV id=float_menu2 onMouseOver="show_menu('float_menu2','c_fship_c')"
  style="border: #ccc 1px solid; border-top:none;DISPLAY: none; Z-INDEX: 20; LEFT: 0px; top:0; WIDTH:70px; padding:0 0 5px 8px;POSITION: absolute;"
  onmouseout="hide_menu('float_menu2','c_fship_c')">
  <UL class=cship_list>
  <LI style="padding-bottom:7px; padding-top:5px;"><A target="_blank" href="user.php">客服中心</A> </LI>
  <LI><A target="_blank" href="user.php">会员后台</A> </LI>
  <LI><A target="_blank" href="user.php?act=order_list">我的订单</A> </LI>
  <LI><A target="_blank" href="user.php?act=message_list">我的留言</A> </LI>
  </UL></DIV></DT>
  <DD>
  </DD></DL></div>
  <div style="float:right; _padding-top:9px; background: url({{asset('themes')}}/jindong/images/nav_bg2.gif) 0 top no-repeat; height:29px; padding-left:28px;">
  <a href="search.php?intro=promotion"  >今日特价</a> <img style="vertical-align:middle" src="{{asset('themes')}}/jindong/images/nav_li.gif">

  <a href="http://vip.souho.cc/"  >极品源码</a> <img style="vertical-align:middle" src="{{asset('themes')}}/jindong/images/nav_li.gif">

  <a href="{{url('cart/index')}}"  >查看购物车</a> <img style="vertical-align:middle" src="{{asset('themes')}}/jindong/images/nav_li.gif">

  <a href="quotation.php"  >报价单</a> <img style="vertical-align:middle" src="{{asset('themes')}}/jindong/images/nav_li.gif">

  </div>

  <div  style="float:right; color:#acacac; padding-right:15px;">
  <script type="text/javascript" src="{{asset('js')}}/transport.js"></script><script type="text/javascript" src="{{asset('js')}}/utils.js"></script>
  <font id="ECS_MEMBERZONE">
  @if(session()->has('centeruserid'))
    <span>您好，{{session()->get('centerusername')}}, 欢迎您回来！</span>
    <a href="{{url('center/index')}}">[会员中心]</a><a href="{{url('user/logout')}}">[退出]</a>
  @else
    <span>您好，欢迎您光临万联商城！</span>
    <a href="{{url('user/login')}}">[请登录]</a>
    <span>，新用户？</span>
    <a style="color:#ff6600" href="{{url('user/register')}}">[免费注册]</a>
  @endif
  </font>

  <script type="text/javascript">
  //<![CDATA[

  // 会员登录
  function signIn()
  {
  var frm = document.forms['ECS_LOGINFORM'];

  if (frm)
  {
  var username = frm.elements['username'].value;
  var password = frm.elements['password'].value;
  var captcha = '';
  if (frm.elements['captcha'])
  {
  captcha = frm.elements['captcha'].value;
  }
  if (username.length == 0 || password.length == 0)
  {
  alert("对不起，您必须完整填写用户名和密码。");
  return;
  }
  else
  {
  Ajax.call('user.php?act=signin', 'username=' + username + '&password=' + encodeURIComponent(password) + '&captcha=' + captcha, signinResponse, "POST", "TEXT");
  }
  }
  else
  {
  alert('Template error!');
  }
  }

  function signinResponse(result)
  {
  var userName = document.forms['ECS_LOGINFORM'].elements['username'].value;
  var mzone = document.getElementById("ECS_MEMBERZONE");
  var res   = result.parseJSON();

  if (res.error > 0)
  {
  // 登录失败
  alert(res.content);
  if(res.html)
  {
  mzone.innerHTML = res.html;
  document.forms['ECS_LOGINFORM'].elements['username'].value = userName;
  }
  }
  else
  {
  if (mzone)
  {
  mzone.innerHTML = res.content;
  evalscript(res.ucdata);
  }
  else
  {
  alert("Template Error!");
  }
  }
  }

  //]]>
  </script>
  </font>
  </div>

  <script type="text/javascript">
  function show_menu(obj_s,obj){
    var  s_id = document.getElementById(obj_s);
    var  sc_id = document.getElementById(obj);
    s_id.style.display = "";
    //sc_id.className = "ahv";
    }

    function hide_menu(obj_h,obj){
    var  h_id = document.getElementById(obj_h);
    var  hc_id = document.getElementById(obj);
    h_id.style.display = "none";
    //hc_id.className = "alk";
  }
  </script>
</ul>
<p id="logo"><img style="float:left" src="{{asset('themes')}}/jindong/images/logo.gif"/></a></p>

</div>
<div id="globalNav">
  <ul>
  <li><a href="{{url('/')}}" @if(!isset($pid)) class="cur" @endif >首页</a></li>
  @foreach($cFirstColsShare as $v)
  <li><a href="{{url('product/lister',['pid'=>$v->id])}}" @if(isset($pid) && $pid == $v->id) class="cur" @endif  >{{$v->name}}</a></li>
  @endforeach

  <li><a href="message.html"  >留言板</a></li>
  </ul>
</div>
<div id="globalSearch">
  <img style="position:absolute; left:0;" src="{{asset('themes')}}/jindong/images/search_box_l.gif">
  <img  style="position:absolute; right:0;" src="{{asset('themes')}}/jindong/images/search_box_r.gif">
  <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()" style="background:#99CC00; padding-left:13px;">

    <div class="search_left">
    <input style="float:left;" name="keywords" type="text" id="keyword" value="请输入商品关键字" onclick="javascript:this.value='';this.style.color='#333333';" />
    <input type="image" src="{{asset('themes')}}/jindong/images/search.gif" style="float:left" />
    <span class="key2">
    热门搜索 ：
    <a target="_blank" style=" color:#ffcccc" href="search.php?keywords=%E5%93%81%E7%89%8C%E6%97%A5%E7%94%A8%E5%93%81">品牌日用品</a>
    <a target="_blank" style=" color:#ffcccc" href="search.php?keywords=%E5%93%81%E7%89%8C%E6%9C%8D%E8%A3%85">品牌服装</a>
    </span>
    </div>
    <div class="search_right">
      <div class="buy_car_bg clearfix" id="ECS_CARTINFO" >
        <a href="{{url('cart/index')}}"><span style="margin-left:34px">购物车中有<b>{{$buyTotalShare}}</b>件商品</span>
        </a>
      </div>
      <a href="{{url('cart/checkout')}}"><img src="{{asset('themes')}}/jindong/images/qujiesuan.gif"></a>
    </div>
  </form>

</div>
<script type="text/javascript">
  //<![CDATA[
  window.onload = function()
  {
  fixpng();
  }
  function checkSearchForm()
  {
  if(document.getElementById('keyword').value)
  {
  return true;
  }
  else
  {
  alert("请输入搜索关键词！");
  return false;
  }
  }
  //]]>
</script>