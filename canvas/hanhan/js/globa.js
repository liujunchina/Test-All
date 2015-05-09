/**
 * Created by Liu.Jun on 15-5-6.
 */
(function($){
    $.extend($.fn,{
        chenkImagesIsLoaded: function(options){
            var defaults = {
                bgimageClassName : 'has-bg-image',
                callback : function(){}
            }
            options = $.extend(defaults,options);

            var myThis = this;
            imagesLoaded(this[0],function(){
                var image;
                var hasBgSection = myThis.find("." + options.bgimageClassName);
                if(hasBgSection.length > 0){
                    // 有背景图片
                    var tmpImages = $("<div />");

                    // 将背景图片以图片的形式插入到 div 中
                    hasBgSection.each(function(){
                        image = $(this).css("background-image").match(/url\((['"])?(.*?)\1\)/);
                        if(image){
                            tmpImages.append($("<img />").attr({
                                "src" : $(this).css("background-image").match(/url\((['"])?(.*?)\1\)/).pop()
                            }))
                        }
                    });
                    imagesLoaded(tmpImages[0],options.callback);

                }else{
                    // 没有背景图片 直接回调
                    options.callback.call();
                }
            })
            return this;
        }
    });
})(Zepto);


(function($,window,document){
    'use strice';
    var ZhenTimer,zhuaTimer,
        DX = 0,
        DY = 0,
        IsAnimation = false;
        MainTranslateY = 0,

        ZhenPosition = 0;
        ZhenNum = -121,
        canvasT = [48, 86, 594, 1708, 3103, 4355, 5730],
        canvasH = [440, 963, 1400, 1147, 1152, 988],
        data = [[8, 0, 7, 10, 7, 0, 4, 4, 7], [10, 10, 10, 10, 10, 10, 10, 11, 0, 0, 0, 10, 10, 5, 9, 5, 0, 7, 8, 8], [10, 10, 10, 10, 10, 10, 10, 11, 0, 0, 0, 9, 4, 8, 7, 0, 10, 7, 7, 10, 10, 10, 0, 10, 4, 5, 9], [10, 10, 10, 10, 10, 10, 10, 11, 0, 0, 0, 8, 7, 10, 7, 10, 8, 8, 0, 3, 8, 10, 6, 9], [10, 10, 10, 10, 10, 10, 10, 11, 0, 0, 0, 3, 6, 7, 4, 7, 6, 0, 10, 9, 9, 7, 0, 4, 6, 5], [10, 10, 10, 10, 10, 10, 10, 11, 0, 0, 0, 10, 7, 7, 0, 9, 9, 3, 0, 8, 0, 7]]

    var startBtnId = 'stratbtn';

    function startBtnChange(type){
        if(type === 'on'){
            $("#" + startBtnId).addClass("on");
        }else{
            $("#" + startBtnId).removeClass("on");
        }
    }

    function zhenAnimaion(){
        ZhenPosition  += ZhenNum;
        (ZhenPosition === 0) ? (ZhenPosition += ZhenNum) : ZhenPosition;
        if(ZhenNum < 0 && ZhenPosition === -2299 || ZhenNum > 0 && ZhenPosition === 2299){
            ZhenNum = -ZhenNum;
        }
        $("#szhen").css({
            backgroundPosition : "0px " + ZhenPosition + "px"
        })

        console.log(ZhenPosition);

        if(Math.abs(ZhenPosition) === 2299){
            $("#sl-2-3").animate({
                transform: "rotate(8deg)"
            },100,'ease-out',function(){
                $(this).animate({
                    transform: "rotate(0deg)"
                },50,'ease-out')
            })
            $("#sl-2-4").animate({
                transform: "rotate(-8deg)"
            },100,'ease-out',function(){
                $(this).animate({
                    transform: "rotate(0deg)"
                },50,'ease-out')
            })
        }
    }

    function drawCanvas(){
        var $canvasBg = $("#spanbox");
        var $canvasArr = [];
        var ctxArr = [];
        var objImgsArr = [];
        $.each(canvasH,function(i,v){
            $canvas = $("<canvas />").attr({
                id: "canvas" + (i + 1),
                width: "450",
                height: canvasH[i]
            }).css({
                left: canvasT[0] + "px",
                top: canvasT[i + 1] + "px",
                position : "absolute",
                display: "block"
            });
            $canvasBg.append($canvas);
            $canvasArr[i] = $canvas;

            objImgsArr[i]  = new Image();
            objImgsArr[i].src = 'http://test.local/canvas/hanhan/images/pages/' + (i + 1) + '.png';

            objImgsArr[i].onload = function(){
                ctxArr[i] = $canvasArr[i].get(0).getContext("2d");
                ctxArr[i].clearRect(0,0,$canvasArr[i].width(),$canvasArr[i].height());
                ctxArr[i].drawImage(objImgsArr[i],0,0,$canvasArr[i].width(),$canvasArr[i].height());
            }
        })
    }

    function drawText(){



    }




    /** fn **/

    $.fn.startAnimation = function(){
        startBtnChange('on');
        $("#szhen-bg").animate({
            top : "13px"
        },100,'ease-out',function(){
            ZhenTimer = setInterval(zhenAnimaion,70);
        });

        drawText();


        return;
    }

    $.fn.stopAnimation = function(){
        startBtnChange('off');
        $("#szhen-bg").stop();
        $("#szhen").css({backgroundPosition:"0px 0px"});

        clearInterval(ZhenTimer);
        return;
    }

    $(document).ready(function(){
        drawCanvas();
    });
})(Zepto,window,document);
