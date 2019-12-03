<?php

namespace App\Http\Controllers;
use App\Libraries\Lib_make;
use GuzzleHttp\Client;
use JonnyW\PhantomJs\Exception\NoPhantomJsException;
use QL\Ext\PhantomJs;
use QL\QueryList;


use Symfony\Component\DomCrawler\Crawler;

class TestController extends Controller
{

    public function rotation(){

        $a = "6666159666
214072113
276948960
1100791755
1298490021
1632200169
1826566874
1925932252
2224101897
2419667890
2900027612
3000229137
3020082431
3201831246
3533739620
3555704166
3647260712
3653241188
3676770054
4179730277
4584565318
4609308852
4817494332
4944790655
4987353562
5071601134
5357005989
5376939858
5441411276
5499515894
5509324601
5631191313
5744118649
5744461628
5797037441
5799483556
5828241924
6232778650
6391217587
6468449425
6570084773
6587269288
6791432427
6791995757
6840170724
6851004764
6986989613
7038625960
7308133167
7309691740
7311793775
7320193452
7453905949
7457721871
7521425348
7583834639
7621843278
7677331744
7742274252
7779174626
7917852520
7949838542
7996608590
8037207059
8086821991
8204167899
8221506090
8224857998
8254197458
8273155639
8368635946
8399167228
8431922492
8450508379
8459501665
8585702176
8614980531
8737575207
8921007767
8946732894
8968741517
8980319048
8992589454
9035365738
9067950002
9238551945
9281728510
9445185397
9981933170
10342690406
10440001912
10457298570
10481470601
10565510300
10704489479
10905619542
10933142511
11040174616
11082171113
11091362082
11363405611
11413948496
11432815138
11464389614
11652189269
11714313497
11913987879
11925110996
11942101194
12002407758
12029196091
12119756307
12252779490
12290562524
12301870603
12365216219
12418884909
12565361067
12628994963
12640723956
12654957798
12804939473
12860745180
13104460475
13111173204
13341481195
13354686303
13553743786
13569816754
13582715662
13613521304
13788292880
13825295697
14196948338
14205965976
14343884395
14892130941
16002703704
16408785744
16411859551
16620447602
17631857250
17802221857
18028432464
18035312810
18635810045
20198273020
20755323114
21454123340
21480495988
21481037739
21795024377
22143146124
22259635389
4640288886
5775958137
5942007843
6054520037
6306796453
8703536280
9451266399
15305736764
19389954252
22022192349
22194412415
2280884995
3095008534
3993685579
4174676938
5938213162
7375395311
7727535141
8597771734
8625694045
8950973078
11779384268
12133060211
13715566435
249248444
352894495
529846709
557558350
1479607501
1587438013
1923802304
2057132434
2221358143
2310313898
2955589109
3110182128
3142768093
3835425015
4314979261
4507544155
5277388511
5393148188
5726866918
6241369124
7344474597
7525300240
8178309037
8401345611
9518680145
9686042957
10022230179
10151239700
10644934457
12019003217
12101146435
13853516691
15978201827
16565037001
16848501424
21731624909
13247897366
1642837705
3014590003
5593478469
7926604176
5618497193
8536821245
5555342267
13115695151
3085230901
6939937935";

        $b = str_replace("\n",',',$a);
        dd($b);
        $data =[];
        $patten = array(" ","　","\t","\r\n", "\n", "\r");


        foreach($data as $k=>$v){
            $v['title_content'] = Lib_make::str_replace_once($v['title_content'],'|',$patten);

            $data[$k] = $v;
        }
        dd($data);

        return view('rotation');
    }



    public function guzzle(){




        //抓取房源信息大概有3277 个

//        $page = 'https://laravel-china.org/topics';
//        $page = "https://www.rakumachi.jp/syuuekibukken/area/prefecture/dimAll/?area%5B%5D=26&area%5B%5D=27102&area%5B%5D=27103&area%5B%5D=27104&area%5B%5D=27106&area%5B%5D=27107&area%5B%5D=27108&area%5B%5D=27109&area%5B%5D=27111&area%5B%5D=27113&area%5B%5D=27114&area%5B%5D=27115&area%5B%5D=27116&area%5B%5D=27117&area%5B%5D=27118&area%5B%5D=27119&area%5B%5D=27120&area%5B%5D=27121&area%5B%5D=27122&area%5B%5D=27123&area%5B%5D=27124&area%5B%5D=27125&area%5B%5D=27126&area%5B%5D=27127&area%5B%5D=27128&area%5B%5D=28101&area%5B%5D=28102&area%5B%5D=28105&area%5B%5D=28106&area%5B%5D=28107&area%5B%5D=28108&area%5B%5D=28109&area%5B%5D=28110&area%5B%5D=28111&newly=&price_from=&price_to=&gross_from=&gross_to=&dim%5B%5D=1001&dim%5B%5D=1002&dim%5B%5D=1003&dim%5B%5D=1004&dim%5B%5D=1005&year=&b_area_from=&b_area_to=&houses_ge=&houses_le=&min=&l_area_from=&l_area_to=&keyword=&ex_real_search=";
//
//
//        //采集规则
//        $rules = array(
//            //文章标题
//            'value' => ['.propertyBlock .listCheckbox','val'],
//            //文章链接
//
//        );
//        $data = \QL\QueryList::get($page)->rules($rules)->queryData();


        $url  = "https://www.rakumachi.jp/syuuekibukken/kansai/osaka/dim1003/1556566/show.html";
//        $url  = "https://product.suning.com/0000000000/176388030.html?safp=d488778a.46602.0.b0c5bd8806";

        $rules2 = array(
            //文章标题
            'imgs' => ['.photoRight td img','src'],
            'key' => ['.Effect03 th','text'],
            'value' => ['.Effect03 td','text'],
            //文章链接

        );

        $ql = QueryList::getInstance();
        $ql->use(PhantomJs::class,'/phantomjs-2.1.1-macosx/bin/phantomjs');
        $ql->use(PhantomJs::class,'/phantomjs-2.1.1-macosx/bin/phantomjs');

        $html = $ql->browser('https://m.toutiao.com')->getHtml();
        dd($html);

        $data = $ql->browser(function (\JonnyW\PhantomJs\Http\RequestInterface $r){
            $r->setMethod('GET');
            $r->setUrl('https://m.toutiao.com');
            $r->setTimeout(10000); // 10 seconds
            $r->setDelay(3); // 3 seconds
            return $r;
        })->find('p')->texts();

        print_r($data->all());

        //采集
//        $data = \QL\QueryList::get($url)->rules($rules2)->queryData();

        $ql = QueryList::html(\QL\QueryList::get($url)->getHtml());
        $imgs= $ql->find('.photoRight img')->src();
        $ths = $ql->find('.Effect03 th')->texts();
        $tds = $ql->find('.Effect03 td')->texts();
        dd($ql,$ths,$tds);
        $data = \QL\QueryList::get($url)->find('.Effect03')->html();
        //查看采集结果
        dd($data,json_decode($data,true));
        dd($data,json_encode($data));


//        $url = "http://ping.chinaz.com/";
//        $client = new Client();
//        $http = $client->request('GET',$url);
//        $crawler = new Crawler();
//
//
//        if ($http->getStatusCode() == 200) {
//
//
//            $content = $crawler->filterXPath('//div[@class="propertyBlock"]');
//
//
//            dd($content->count());
//            if ($content->count() > 0) {
//                // 如果 $content->count() > 1的话可以使用循环获取内容信息
//                foreach ($content as $node) {
//                    // 这里的 node 是 DOMElement Object，操作查看手册
//                }
//
//                // 在这里面我们可以继续使用 filterXpath 进行查找
//
//                echo $content->text(); // 输出文本信息
//                echo $content->html(); // 获取 html 信息
//
//            }
//
//        }

//        dd($client,$http,$crawler);
    }


}


