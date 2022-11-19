<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div
        style="font-size:11pt;background-color:#fafafa;font-family:Arial,sans-serif;width:50vw;min-width:600px;margin-left:auto;margin-right:auto">
        <div style="background-color:white;padding-bottom:0.1em;margin-bottom:1em;margin-left:auto;margin-right:auto;max-width:600px;width:600px;font-family:Arial,sans-serif;font-size:11pt"
            width="600">

            <table id="m_7226892206353359109header"
                style="color:white;min-width:100%;padding:1em;font-family:Arial,sans-serif;font-size:11pt;background-color:#ee2737">
                <tbody>
                    <tr>
                        <td style="max-width:25%">
                            <img width="200"
                                src="https://ci5.googleusercontent.com/proxy/7kzns33ndt4WSvYpKN5PUQ_dYlubDDpwRGXVK1t0RjwxstDXtVx4bnB2xvvBoy__uRBF3pFicXZ-bFk4VFRyG6cigbzxBT_yQQNrVWDp12RftJL50QcfC4MTkmH0vgSUVR2BrTYCwbrltSvL9Q7Cgz4KK0SizvecvVZO9jdYLYRX4I3i3yo2xttMHcgIo7Zwwyao1NjQAnBaycTe=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/6b492c2e-738b-4f2d-b523-0fd06a4aba5b_2d_3x_subbrand_order_receipt_gofood.png"
                                style="max-width:30vw" class="CToWUd" data-bit="iit">
                        </td>
                        <td style="width:75%">
                            <div style="text-align:right">Thứ sáu, 21 Tháng 10 2022</div>
                            <div style="text-align:right">Mã đơn hàng: {!! $orderId !!}</div>
                        </td>
                    </tr>
                </tbody>
            </table>


            <table id="m_7226892206353359109thanks" style="width:95%;margin-top:1em;margin-left:1em;margin-right:2em">
                <tbody>
                    <tr>
                        <td style="vertical-align:top">
                            <h3>Cảm ơn bạn đã mua sắm tại WineHub</h3>
                        </td>
                    </tr>
                </tbody>
            </table>


            <table id="m_7226892206353359109header-total"
                style="text-align:center;margin-top:0.5em;margin-bottom:0.5em;padding:0.5em;margin-left:auto;margin-right:auto;width:70%;border:1px solid #e8e8e8;background-color:#fafafa">
                <tbody>
                    <tr>
                        <td
                            style="font-weight:bold;font-size:13pt;vertical-align:center;text-align:left;padding:0.2em;padding-left:1em">
                            Tổng thanh toán</td>
                        <td
                            style="font-weight:bold;color:green;font-size:13pt;vertical-align:center;text-align:right;padding:0.2em;padding-right:1em">
                            {!! number_format($Total_price) !!} VNĐ</td>
                    </tr>
                </tbody>
            </table>



            <p id="m_7226892206353359109order-details-header"
                style="margin-left:1em;margin-top:2em;font-size:12pt;font-weight:bold">Thông tin đơn hàng</p>
            <table id="m_7226892206353359109orders"
                style="padding:1em;border:1px solid #e8e8e8;width:96%;margin-left:0.8em;margin-right:1em">

                <tbody>
                    @foreach ($Items as $item)
                        <tr>
                            <td style="vertical-align:top"><b>{!! $item['quantity'] !!}</b></td>
                            <td>
                                {!! $item['productName'] !!}
                                <p></p>
                            </td>
                            {{-- <td> 
                                <img class="img pe-2" src="  {!! $item['image'] !!}" height="25%"
                                            width="25%" alt="{!! $item['productName'] !!}">
                                <p></p>
                            </td> --}}
                            <td style="text-align:right;vertical-align:top">
                                {!! number_format($item['price']) !!}
                            </td>
                            <td style="text-align:right;vertical-align:top">
                                <b> {!! number_format($item['price'] * $item['quantity']) !!}</b>
                            </td>
                        </tr>
                    @endforeach
                    {{-- 
                    <tr>
                        <td colspan="2" style="font-weight:bold">Tạm tính</td>
                        <td style="text-align:right;vertical-align:top">
                        </td>
                        <td style="font-weight:bold;text-align:right;vertical-align:top">
                            70.000₫
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">Phí giao hàng</td>
                        <td style="text-align:right;vertical-align:top">
                        </td>
                        <td style="text-align:right;vertical-align:top">
                            20.000₫
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">Phí dịch vụ &amp; phí khác</td>
                        <td style="text-align:right;vertical-align:top">
                        </td>
                        <td style="text-align:right;vertical-align:top">
                            2.000₫
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">Giảm giá</td>
                        <td style="text-align:right;vertical-align:top">
                        </td>
                        <td style="text-align:right;vertical-align:top">
                            -25.000₫
                        </td>
                    </tr> --}}


                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="font-weight:bold">Tổng thanh toán</td>
                        <td style="text-align:right;vertical-align:top">
                        </td>
                        <td style="font-weight:bold;text-align:right;vertical-align:top">
                            {!! number_format($Total_price) !!} VNĐ
                        </td>
                    </tr>

                    {{-- <tr>
                        <td colspan="2">Thanh toán bằng Tiền mặt</td>
                        <td style="text-align:right;vertical-align:top">
                        </td>
                        <td style="text-align:right;vertical-align:top">
                            67.000₫
                        </td>
                    </tr> --}}
                </tbody>
            </table>


            <p id="m_7226892206353359109delivery-details-header"
                style="margin-top:2em;margin-left:1em;font-size:12pt;font-weight:bold">Thông tin giao hàng</p>
            <table id="m_7226892206353359109delivery-details"
                style="padding-left:1em;width:96%;margin-right:auto;padding-top:1em;padding-bottom:0.5em;border:1px solid #e8e8e8;margin-left:auto;margin-bottom:1em">
                <tbody>
                    <tr style="vertical-align:top">
                        {{-- <td style="width:50%;vertical-align:top">
                            <table id="m_7226892206353359109delivery">
                                <tbody>
                                    <tr>
                                        <td style="font-size:12pt;font-weight:600">Đỗ Văn Đông</td>
                                    </tr>
                                    <tr>
                                        <td>59V1-93661<span> • </span>Honda Air Blade</td>
                                    </tr>
                                </tbody>
                            </table>


                            <table id="m_7226892206353359109route" style="padding:0em;padding-top:1em;margin-right:1em">
                                <tbody>
                                    <tr>

                                        <td colspan="2" style="vertical-align:top">
                                            <img alt="Distance" height="16" width="16"
                                                src="https://ci5.googleusercontent.com/proxy/-h8RlNnOszVzpSTxH4toTmfC5IUf8GGCdKdfnjOmq8ibgeshmS8PCiMU7ADQfe_ms-4kXGqTt01fBBWw72HAexniqE7y34q-aG4EhcSRrhSfkePz-VVprNQsOOpyr8mfypcN0HkEn7Tg5JjYxAZEd3IS7Eyvu9ejetP-xMwsqzpRAgQ=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/15de2fb2-6af3-4a96-ba68-adaa310039f2_distance_ic.png"
                                                class="CToWUd" data-bit="iit">
                                            <span style="vertical-align:top"> Quãng đường 2.6 km</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="vertical-align:top">
                                            <img alt="Trip Time" height="16" width="16"
                                                src="https://ci3.googleusercontent.com/proxy/ru_F3YPh4JGJPK9z_6F5CRYu1a27eUGwL9w0f1bLPDjlDURgN9fU1YyFKnyMp3E9v06ojq6hEp2MWij2HampVYsP9CEpbC4jaQHYNVKfGNPbD5y1T6wrhQEqxUJz8HfXCVIbl9kH5iwirD8RtOn8D2ZgZcVmphGAEceF_unX0PNK-_QQLJrHa35Wn8k9dgoswZutuH8=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/76b8ac9f-900b-4802-9257-10c222225406_order_receipt_ic_map_copy_v2.png"
                                                class="CToWUd" data-bit="iit">
                                            <span style="vertical-align:top">Thời gian giao hàng 13 phút</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td> --}}
                        <td style="vertical-align:top">
                            <table id="m_7226892206353359109address" style="margin-right:1em">
                                <tbody>
                                    {{-- <tr style="vertical-align:top">
                                        <td>
                                            <img height="16" width="16"
                                                src="https://ci3.googleusercontent.com/proxy/mNmQAxEq2wSHhgE79Oox-38LrhmomldKJua08ThQVkp-gc-Lb37H3QxFZUsxoRnJwOugK7gOXMnn63W6U5spprwAKCXr5zKoy25xJWxp0h1M_JyzWcikVC5TVkw3TPX1lR4Pd22YPQfy8WG8OETqRa-UVzX1VxdV9TYdySJf3-Hjow=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/d50f5532-a56a-4865-96c1-8c810a122235_address_ic.png"
                                                class="CToWUd" data-bit="iit">
                                        </td>
                                        <td>Giao hàng lúc 22:45 từ"</td>
                                    </tr> --}}
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p style="font-weight:bold;font-size:12pt;margin-top:0px">
                                                {!! $name !!}</p>
                                            <p>{!! $Phone !!}</p>
                                            <p>{!! $Address !!}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- <table id="m_7226892206353359109address" style="margin-right:1em">
                                <tbody>
                                    <tr style="vertical-align:top">
                                        <td>
                                            <img height="16" width="16"
                                                src="https://ci6.googleusercontent.com/proxy/YRK6H3W4GGX5yV7torP79VhwnvGmbQ_J36-z1prthTyK9FG-G0Txm0LgMnOmkbnmyPKzEVUnESFdKq1O5VLyJDpul2l6ueL6T41kr-ppfsM1fT2XIdt5KGUYHcOEGH60Zg7UtmVLRHQxW5H6OpgqBlqShQq_NfHis7NdC0eMgk0gmSBW-SEj1Qj-CtKaXJCEI8Vq4p9XcAI=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/9000727f-2512-4e0e-a831-695e93cd7741_order_receipt_destination_ic_v3.png"
                                                class="CToWUd" data-bit="iit">
                                        </td>
                                        <td>Nhận hàng lúc 22:59 tại</td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <p style="font-weight:bold;font-size:12pt;margin-top:0px">267/5A Tổ 10 KP1
                                            </p>

                                            267/5A Tổ 10 KP1, Tân Hưng Thuận, Quận 12, Thành phố Hồ Chí Minh, Vietnam
                                        </td>
                                    </tr>


                                </tbody>
                            </table> --}}
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
        <div style="margin-left:auto;margin-right:auto;max-width:600px;width:600px">


            <table id="m_7226892206353359109help-links"
                style="text-align:center;width:90%;margin-top:3em;margin-left:auto;margin-right:auto">
                <tbody>
                    <tr>

                        <td style="width:30%;vertical-align:top">
                            <img height="14" width="14"
                                src="https://ci5.googleusercontent.com/proxy/i3dLximYOh7WavTS4ZzmxuO6e1Iu_mNT1uxOO55lf20L4Bkvm-ua3_BJ2sCY9_Jiz__3WjAB_9g70RuG0rQc0n4CnDfX3Wb4JQGjkg1B_n40K_0HypnX0paMgSqDo9NarFH1k0lc6Jbhleq5McsqLZ5kGuqDIsdtAs557uLVXg=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/c878cabe-079c-4b4b-8634-69e88eb0b99f_help_ic.png"
                                class="CToWUd" data-bit="iit">&nbsp;
                            <a href="https://gojek.link/gocore/help" target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://gojek.link/gocore/help&amp;source=gmail&amp;ust=1668407794186000&amp;usg=AOvVaw1HPd92ItK1MDEWRiaVjLXb">
                                Trợ giúp</a>
                        </td>

                        <td style="width:30%;vertical-align:top">
                            <img height="14" width="14"
                                src="https://ci6.googleusercontent.com/proxy/2A5yynOVpNGRO4KpY65YN-5quh5J8Cs_ubmOhLn20HmvkGyVq_pJ6O8DjWARrdMY1jIHxi0hipWeiA2izSKogG-R9X-N8ikaZLfNLhAVYVDFjNxDLBFGIUXrreDyLoXEOnUfnsryjR-v3BoglhmIQaYnQ82Qcy0XHj3e2iKq-_0Y=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/830a3e92-bbee-479a-9d87-b39b52052b5a_report_ic.png"
                                class="CToWUd" data-bit="iit">&nbsp;
                            <a href="https://gojek.link/gocore/help/articlegroup/19d7b014-0597-463d-a71c-5e9f140d4199"
                                target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://gojek.link/gocore/help/articlegroup/19d7b014-0597-463d-a71c-5e9f140d4199&amp;source=gmail&amp;ust=1668407794186000&amp;usg=AOvVaw1rNuMebjAGM7EjLBYnh3Cd">
                                Báo cáo vấn đề</a>
                        </td>

                        <td style="width:30%;vertical-align:top">
                            <img height="14" width="14"
                                src="https://ci5.googleusercontent.com/proxy/VfVpnLJRYUBoPVn6j0ypRQ2zvO6c5BpDlCPR4E_lK2buKNwD24-lOp56yslHO44oDg80XUYsopsNIgAYv8yHeMi7tDy7GTL5oajho6V8j2eBa0dQ0m92uG0JsBbdoJeTC5WBO1zs6Yb6IoWOrHyccAfr3SFjesKjERX4RbGNNovCCQ=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/f3a0a293-bafc-4cd2-94d3-1e8c90309030_article_ic.png"
                                class="CToWUd" data-bit="iit">&nbsp;
                            <a href="https://gojek.link/gocore/help/articlegroup/56a1541e-2803-4fbd-993c-b37dc484f7e4"
                                target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://gojek.link/gocore/help/articlegroup/56a1541e-2803-4fbd-993c-b37dc484f7e4&amp;source=gmail&amp;ust=1668407794186000&amp;usg=AOvVaw1YHptcOXIqrN0HSoeI3J9m">
                                Về dịch vụ GoFood</a>
                        </td>

                    </tr>
                </tbody>
            </table>



            <table style="text-align:center;width:100%;padding:1em">
                <tbody>
                    <tr>
                        <td> Tổng thanh toán cuối cùng là số tiền bạn đã trả sau khi đơn hàng hoàn tất. Số tiền này có
                            thể khác so với giá tiền tạm tính khi đặt hàng, do tình trạng hàng hoá thay đổi hoặc các lý
                            do khác. Số tiền hiển thị trên biên lai là số tiền cuối cùng cần thanh toán. Các phụ phí
                            khác như tiền tip được thực hiện sau khi đơn hàng hoàn tất sẽ không bao gồm trong hoá đơn
                            này.
                        </td>
                    </tr>
                </tbody>
            </table>
            <table id="m_7226892206353359109socials"
                style="text-align:center;width:50%;margin-left:auto;margin-right:auto">
                <tbody>
                    <tr style="text-align:center">
                        <td colspan="5">
                            <p>Kết nối với WineHub</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%"> <a href="https://www.instagram.com/gojekindonesia/" target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://www.instagram.com/gojekindonesia/&amp;source=gmail&amp;ust=1668407794186000&amp;usg=AOvVaw1os2ufhuPG_sIMdsB9VmUm"><img
                                    src="https://ci4.googleusercontent.com/proxy/eHt5B6GvLK7XBLubPebDDyEgBl7G3bDTh-AmKLufvKUfmMba6diNuZnZiCJy0O_sJbHznWOpi188PMAIUA9FRy-SER-jBOmVbzMNhrv3s60IaXYUi0cOnpcQS3UIS8bljbg4BYasP8suXSvHb2oNDA6mL5WI0Fkxo3RQxLt6nX8KvWM6a62wyNRVmjgbTA=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/b53053cb-9908-4ccc-868a-1c243dfc2ae5_order-receipt-Group-19.png"
                                    height="28" width="28" class="CToWUd" data-bit="iit"></a></td>

                        <td width="20%"> <a href="https://twitter.com/gojekindonesia" target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/gojekindonesia&amp;source=gmail&amp;ust=1668407794186000&amp;usg=AOvVaw3lJ5Poj1depmX62NUERbQ4"><img
                                    src="https://ci6.googleusercontent.com/proxy/0obpLy89r3f40__rWmOK5STR-6yGOKMu5uX57eXPmkhF6R5evu7M8VwrLsVWQmVeAHxxHNnUblcUlv0bjbDd_oln6mehWM4hTo9wDtqld0OUCi_3BX3Q3Xd59O_g3f0oyT-TmNOisYZVCdNqLkbpXiOKWVAzHZLozN9ZOZR8JTdLB_Kt5PoZuQret4qZIQ=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/4d8397a5-9bea-4603-b128-42d762db09b9_order-receipt-Group-16.png"
                                    height="28" width="28" class="CToWUd" data-bit="iit"></a></td>

                        <td width="20%"> <a href="https://www.facebook.com/gojekindonesia" target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/gojekindonesia&amp;source=gmail&amp;ust=1668407794186000&amp;usg=AOvVaw00CNurIZzX-mzPLKILm62P"><img
                                    src="https://ci5.googleusercontent.com/proxy/VbeXtVSdsvyWVqOhzaFpqESDzjhdmQokWoLqV13n0CODr6JgpPK4HxwAUYAzquLbdwndocIe5BayDwDiF1_5lINRAzr_ZhfkhTcFm3athOYOd7yEZjAU1ESnqYnh0QOZfFGoxdgPhRilIo0OlDiFHHEAJ_K_V0v4cRyhsFhLiaAEmMA4lBjvkDMJbxGC5Q=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/13880da3-3a6f-495d-8458-db42d3ad48d2_order-receipt-Group-18.png"
                                    height="28" width="28" class="CToWUd" data-bit="iit"></a></td>

                        <td width="20%"> <a href="https://www.youtube.com/channel/UCmlKSK0OKn_B3oPwElW4n5w"
                                target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://www.youtube.com/channel/UCmlKSK0OKn_B3oPwElW4n5w&amp;source=gmail&amp;ust=1668407794187000&amp;usg=AOvVaw1K-IxGQSHQLl0RgEoCf89d"><img
                                    src="https://ci6.googleusercontent.com/proxy/hluP4Q8kYwgH3hCGQpqghR_I6Wavf4s2Q76Mmz4pl9Le4n67AqsXqSHkpG9JRpFmUkEBbHejF3Rm8I2z6nmHiLYO5sByIrxgF5XfO2LB1UNzOQckJbGNSHZC4JpDL5HkN-nz0XaH2ZWXFiPbntIQLqD6GdYr3X_v0OHPsQkzuWLK0bper0ZiuuirwgId8w=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/5a83275f-753f-47a1-85ca-a876ec3c03c2_order-receipt-Group-20.png"
                                    height="28" width="28" class="CToWUd" data-bit="iit"></a></td>

                        <td width="20%"> <a href="https://www.linkedin.com/company/gojek/" target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://www.linkedin.com/company/gojek/&amp;source=gmail&amp;ust=1668407794187000&amp;usg=AOvVaw1VSFqqIn46xuk5SN2PfXnx"><img
                                    src="https://ci3.googleusercontent.com/proxy/nKbeGF2NriYmKym15D4CvJmYZ08zSbDZR4dJPnp4KAuknYqkZzG9uIyG60miEvbJs_XbhtKCNHMX416cAUxyaVifmlKIHJZjzE8Us20G3RP9G1905DUYeA91V0xvZSMCTRTivd14g_iRSB45sOf20ygAxJGogdu0A5K4NzqbsEmvYzGqJgWANaJ3pXgkQw=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/26ee71cc-1573-42c0-a024-798351532928_order-receipt-Group-21.png"
                                    height="28" width="28" class="CToWUd" data-bit="iit"></a></td>
                    </tr>
                </tbody>
            </table>
            <table id="m_7226892206353359109gojek-address"
                style="width:60%;text-align:center;margin-left:auto;margin-right:auto;margin-top:2em">
                <tbody>
                    <tr>
                        <td style="max-width:200px">
                            <img height="30"
                                src="https://ci3.googleusercontent.com/proxy/spRvA1Bw2bCnHkQpvT08TF8eIwyHWUtc5NwQgAsxOLQt7k0PKp-2tdlqBJRXQ4nXZfONJtNaG3DokuOcd36M8WDiv_FVAMG-5P8wj_Ug7QoE_fK_xxrNA80tnbyVKwTXj0PkEQGP9e0HM_e79TQ57hdVXWdnYHMDGwuWuRQ=s0-d-e1-ft#https://i.gojekapi.com/darkroom/customer-platform/v2/images/dc896497-f2fd-435e-b4de-a222ddcee7ed_gojek.png"
                                class="CToWUd" data-bit="iit">
                            <p>19th floor, Pearl Plaza tower (office area), 561A Dien Bien Phu Street, Ward 25, Binh
                                Thanh District, Ho Chi Minh City, Vietnam. Hotline: 1900636252</p>
                        </td>
                    </tr>

                </tbody>
            </table>


        </div>

        <img width="1px" height="1px" alt=""
            src="https://ci4.googleusercontent.com/proxy/hgVKf7rJgwYmIrlt9e7gGLNIBt-6hxAR7B331AGdIijwnarv1-HR5jvdPlYvcO00w08PWvvZzGEu8v5IslwSVK9BrE5hhZDIHKW5ivhY_xhYzHqBA4VfIbL-mF6CvHiJXsF-z-7AA2_WIQ9VJatEDJcBcnwJkSsHbkW7HjPRg4-7c6Y6bfpwzVAXF66IJLrFODhKspLDfqvyut_kBGMJuVjD6HzZuH8iGreiUKKDRFFJBhXFSihnAQXPCBcVCCviGp7vur7IzUsudJSZUc9mu0e8hhHh2_-lK7Rnid9kyBgNnNZmZSgyZmHiJn3PguE1rZkIgpYFgSoTOEbNWNvEppwIoGIMdDlBc2VX33ld7RanrnFptA=s0-d-e1-ft#http://email.invoicing.gojek.com/o/eJwdjssOgjAQAL_G3iDt7na3PfRbTJ9YUUiAkPj3oufJTKYGw8zIDpjUscU892W69xLIi_M64gAWy0C58ZC4xYGlJZ0sVPFV9QAawGgwhjUBjVockk2NsAAgxRvpvpxrz1d1nNZnnce8vtUjSPENrWTDmQ2QFpucbQI-oZQcm9rCoy5H7PNxLgjmCk3v2F9_Pb_6xX6XMX32fVpVCdWZhPwFmaQ9Ow"
            class="CToWUd" data-bit="iit">
    </div>
</body>

</html>
