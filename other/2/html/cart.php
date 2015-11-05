<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'top.htm'; ?>
    <link rel="stylesheet" href="../dist/mincss/cart_min.css">
</head>
<body>
<header id="header">
    <?php include 'public_cart_top.htm'; ?>
</header>

<div class="wrap pb40">
    <div id="cart_page" class="hf pt20 pb50">
        <h1 class="title">我的购物车</h1>
        <div class="cart_list">
            <form action="" id="cart_form"></form>
        </div>
    </div>
</div>

<footer id="footer" class="cart_footer">
    <?php include 'foot.php'; ?>
</footer><!--end #footer -->

<script id="cart_tmp" type="text/html">
    {{# if(d.cart_list.length <=0){ }}
    <div class="cart_empty_warp">
        <div class="cart_empty">
            <div class="cart_empty_icon cart_icon"></div>
            <div class="cart_empty_msg">
                <div class="cart_empty_text">
                    你的购物车还是空的
                    赶紧行动吧！
                </div>
                <a href="#" class="btn btn-default mt15">马上去购物</a>
            </div>
        </div>
    </div>
    {{# }else{ }}
    <table class="cart_table">
        <thead>
        <tr>
            <th class="first"><span class="icon_checkbox cart_icon1 js_select_all js_select_checkbox" data-cart-id="0"></span>全选</th>
            <th>商品信息</th>
            <th>单价（元）</th>
            <th>数量</th>
            <th>小计（元）</th>
            <th class="last_item">操作</th>
        </tr>
        </thead>
        <tbody>
            {{# for(var i = 0, len = d.cart_list.length; i < d.cart_list.length; i++){ }}
            <tr>
                <td class="first">
                    <span class="icon_checkbox js_select_checkbox cart_icon1 js_select_tiem {{# if(d.cart_list[i].is_checkout == 1){ }}selected{{# }}}" data-cart-id="{{d.cart_list[i].cart_id}}"></span>
                </td>
                <td>
                    <div class="cart_goods_img">
                        <a href="{{d.cart_list[i].url}}">
                            <img src="{{d.cart_list[i].img}}" alt="{{d.cart_list[i].title}}" width="100" height="100"/>
                        </a>
                    </div>
                    <div class="cart_goods_content tl ml15">
                        <p>
                            <a href="{{d.cart_list[i].url}}" class="cart_goods_title">{{d.cart_list[i].title}}</a>
                        </p>
                        <p class="cart_goods_des">{{d.cart_list[i].cart_goods_des}}</p>
                        <p class="cart_shipping_address cart_icon1"><span class="cart_icon icon_shipping_address"></span>{{d.cart_list[i].shipping_address}}</p>
                    </div>
                </td>
                <td>
                    <p class="price">{{d.cart_list[i].goods_price}}</p>
                    <p class="original_price">{{d.cart_list[i].market_price}}</p>
                </td>
                <td>
                    <p class="inline-block">
                        <a class="cart_goods_minus cart_box brnone js_update_num {{# if(d.cart_list[i].goods_num == 1){ }}disabled{{# }}}" href="javascript:void (0)">-</a>
                        <input type="text" class="cart_goods_num cart_box" onkeyup="CART.changeEvent(this)" data-cart-id="{{d.cart_list[i].cart_id}}" value="{{d.cart_list[i].goods_num}}">
                        <a class="cart_goods_plus cart_box blnone js_update_num" href="javascript:void (0)">+</a>
                    </p>
                </td>
                <td>
                    {{d.cart_list[i].sub_total}}
                </td>
                <td class="last_item">
                    <a class="cart_icon icon_cart_remove js_cart_remove" href="javascript:void (0)" data-cart-id="{{d.cart_list[i].cart_id}}"></a>
                </td>
            </tr>
            {{# } }}
        </tbody>
    </table>
    <div class="cart_gotopay pt20">
        <div class="clearfix">
            <label class="select_all_warp fl pl15">
                <span class="cart_icon1 icon_checkbox js_select_all js_select_checkbox" data-cart-id="0"></span>全选
            </label>
            <table class="cart_gotopay_table cart_total_table">
                <tbody class="tr">
                <tr>
                    <td>商品总计：</td>
                    <td>￥<span>{{d.total.total_price}}</span></td>
                </tr>
                <tr>
                    <td>订单关税：</td>
                    <td>￥<span>{{d.total.tariff}}</span></td>
                </tr>
                <tr>
                    <td>已选择商品 <span class="cart_goods_num color_increase">{{d.total.cartNum}}</span>件，总价（不含运费）：</td>
                    <td class="cart_total_price color_increase">￥<span>{{d.total.goods_total}}</span></td>
                </tr>
                </tbody>
            </table>
        </div>

        {{# if(d.total.goods_total > 1000){ }}
        <div class="notice_limit">
            <div class="msg_text">
                <div class="cart_icon1 icon_msg">
                    <div class="drop_box notice_limit_drop none">
                        <span class="msg_title">海关规定：</span><br/>
                        ① 消费者购买进口商品，以“个人自用，合理数量”为原则，每单最大购买限额为1000元人民币。 <br/>
                        ② 如果订单只含单件不可分割商品，则可以超过1000元限值。
                        <span class="triangle-right"><span class="triangle-right"></span></span>
                    </div>
                </div>
                您已超过海关限额 <span class="color_increase">￥1000</span>，请选择部分商品进行结算

            </div>
        </div>
        {{# }}}

        <div class="cart_checkout pt20 cart_bottom_warp clearfix">
            <div class="back_home fl">
                <a href="#">< 继续购物</a>
            </div>
            <div class="right_checkout fr clearfix">
                <div class="qr_code_warp fl clearfix">
                    <span class="qr_code_img cart_icon fl"></span>
                                    <span class="qr_code_text fl">
                                        扫一扫 <br/>
                                        <span class="color_increase">手机购买更便宜</span>
                                    </span>
                    <div class="qr_code_drop drop_box none">
                        <img src="../dist/images/domeimg/qr_code_app.jpg" alt=""/>
                        App首单减5元
                        <span class="triangle-right"><span class="triangle-right"></span></span>
                    </div>
                </div>
                <a href="#" class="submit btn btn-default btn-xl fl {{# if(d.total.goods_total > 1000){ }}disabled{{# }}}" {{# if(d.total.goods_total > 1000){ }}onclick = 'return false;'{{# }}}>去结算</a>
            </div>
        </div>
    </div>

    {{# } }}
</script>


<script>
    $LAB.script("laytpl.min.js")
        .wait()
        .script("cart.min.js");
</script>

</body>
</html>