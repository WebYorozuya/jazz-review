@extends('layouts.ourapp')

@section('title', '利用規約')

@section('css')
<!-- Heroku -->
<link rel="stylesheet" href="{{secure_asset('css/terms.css')}}">
<!-- Local -->
<link rel="stylesheet" href="{{asset('css/terms.css')}}">
@endsection

@component('components.header')
@slot('user')
{{$user}}
@endslot
@endcomponent

@section('main')
<div class="terms">
    <h1>Jazz Logの利用規約</h1>
    <p>この利用規約（以下，「本規約」といいます。）は，Jazz
        Log がこのウェブサイト上で提供するサービス（以下，「本サービス」といいます。）の利用条件を定めるものです。登録ユーザーの皆さま（以下，「ユーザー」といいます。）には，本規約に従って，本サービスをご利用いただきます。
    </p>

    <h2>第1条（適用）</h2>
    <ol>
        <li>本規約は，ユーザーと Jazz Log との間の本サービスの利用に関わる一切の関係に適用されるものとします。</li>
        <li> Jazz Log は本サービスに関し，本規約のほか，ご利用にあたってのルール等，各種の定め（以下，「個別規定」といいます。）をすることがあります。これら個別規定はその名称のいかんに関わらず，本規約の一部を構成するものとします。
        </li>
        <li>本規約の規定が前条の個別規定の規定と矛盾する場合には，個別規定において特段の定めなき限り，個別規定の規定が優先されるものとします。</li>
    </ol>
    <h2>第2条（利用登録）</h2>
    <ol>
        <li>本サービスにおいては，登録希望者が本規約に同意の上， Jazz Log の定める方法によって利用登録を申請し， Jazz Log がこれを承認することによって，利用登録が完了するものとします。</li>
        <li> Jazz Log は，利用登録の申請者に以下の事由があると判断した場合，利用登録の申請を承認しないことがあり，その理由については一切の開示義務を負わないものとします。
            <ol>
                <li>利用登録の申請に際して虚偽の事項を届け出た場合</li>
                <li>本規約に違反したことがある者からの申請である場合</li>
                <li>その他， Jazz Log が利用登録を相当でないと判断した場合</li>
            </ol>
        </li>
    </ol>
    <h2>第3条（ユーザーIDおよびパスワードの管理）</h2>
    <ol>
        <li>ユーザーは，自己の責任において，本サービスのユーザーIDおよびパスワードを適切に管理するものとします。</li>
        <li>ユーザーは，いかなる場合にも，ユーザーIDおよびパスワードを第三者に譲渡または貸与し，もしくは第三者と共用することはできません。 Jazz Log は，ユーザーIDとパスワードの組み合わせが登録情報と一致してログインされた場合には，そのユーザーIDを登録しているユーザー自身による利用とみなします。
        </li>
        <li>ユーザーID及びパスワードが第三者によって使用されたことによって生じた損害は， Jazz Log に故意又は重大な過失がある場合を除き， Jazz Log は一切の責任を負わないものとします。</li>
    </ol>
    <h2>第4条（禁止事項）</h2>
    <p>ユーザーは，本サービスの利用にあたり，以下の行為をしてはなりません。</p>
    <ol>
        <li>法令または公序良俗に違反する行為</li>
        <li>犯罪行為に関連する行為</li>
        <li>本サービスの内容等，本サービスに含まれる著作権，商標権ほか知的財産権を侵害する行為</li>
        <li> Jazz Log ，ほかのユーザー，またはその他第三者のサーバーまたはネットワークの機能を破壊したり，妨害したりする行為</li>
        <li> 本サービスによって得られた情報を商業的に利用する行為</li>
        <li> Jazz Log のサービスの運営を妨害するおそれのある行為</li>
        <li>不正アクセスをし，またはこれを試みる行為</li>
        <li> 他のユーザーに関する個人情報等を収集または蓄積する行為</li>
        <li> 不正な目的を持って本サービスを利用する行為</li>
        <li> 本サービスの他のユーザーまたはその他の第三者に不利益，損害，不快感を与える行為</li>
        <li> 他のユーザーに成りすます行為</li>
        <li>  Jazz Log が許諾しない本サービス上での宣伝，広告，勧誘，または営業行為</li>
        <li> 面識のない異性との出会いを目的とした行為</li>
        <li>  Jazz Log のサービスに関連して，反社会的勢力に対して直接または間接に利益を供与する行為</li>
        <li> その他， Jazz Log が不適切と判断する行為</li>
    </ol>
    <h2>第5条（本サービスの提供の停止等）</h2>
    <ol>
        <li> Jazz Log は，以下のいずれかの事由があると判断した場合，ユーザーに事前に通知することなく本サービスの全部または一部の提供を停止または中断することができるものとします。
            <ol>
                <li>本サービスにかかるコンピュータシステムの保守点検または更新を行う場合</li>
                <li>地震，落雷，火災，停電または天災などの不可抗力により，本サービスの提供が困難となった場合</li>
                <li>コンピュータまたは通信回線等が事故により停止した場合</li>
                <li>その他， Jazz Log が本サービスの提供が困難と判断した場合</li>
            </ol>
        </li>
        <li> Jazz Log は，本サービスの提供の停止または中断により，ユーザーまたは第三者が被ったいかなる不利益または損害についても，一切の責任を負わないものとします。</li>
    </ol>

    <h2>第6条（利用制限および登録抹消）</h2>
    <ol>
        <li> Jazz Log は，ユーザーが以下のいずれかに該当する場合には，事前の通知なく，ユーザーに対して，本サービスの全部もしくは一部の利用を制限し，またはユーザーとしての登録を抹消することができるものとします。
            <ol>
                <li>本規約のいずれかの条項に違反した場合</li>
                <li>登録事項に虚偽の事実があることが判明した場合</li>
                <li>料金等の支払債務の不履行があった場合</li>
                <li> Jazz Log からの連絡に対し，一定期間返答がない場合</li>
                <li>本サービスについて，最終の利用から一定期間利用がない場合</li>
                <li> その他， Jazz Log が本サービスの利用を適当でないと判断した場合</li>
            </ol>
        </li>
        <li>  Jazz Log は，本条に基づき Jazz Log が行った行為によりユーザーに生じた損害について，一切の責任を負いません。</li>
    </ol>

    <h2>第7条（退会）</h2>
    <P>ユーザーは， Jazz Log の定める退会手続により，本サービスから退会できるものとします。</P>

    <h2>第8条（保証の否認および免責事項）</h2>
    <ol>
        <li> Jazz Log は，本サービスに事実上または法律上の瑕疵（安全性，信頼性，正確性，完全性，有効性，特定の目的への適合性，セキュリティなどに関する欠陥，エラーやバグ，権利侵害などを含みます。）がないことを明示的にも黙示的にも保証しておりません。
        </li>
        <li> Jazz Log は，本サービスに起因してユーザーに生じたあらゆる損害について一切の責任を負いません。ただし，本サービスに関する Jazz Log とユーザーとの間の契約（本規約を含みます。）が消費者契約法に定める消費者契約となる場合，この免責規定は適用されません。
        </li>
        <li>前項ただし書に定める場合であっても， Jazz Log は， Jazz Log の過失（重過失を除きます。）による債務不履行または不法行為によりユーザーに生じた損害のうち特別な事情から生じた損害（ Jazz Log またはユーザーが損害発生につき予見し，または予見し得た場合を含みます。）について一切の責任を負いません。また， Jazz Log の過失（重過失を除きます。）による債務不履行または不法行為によりユーザーに生じた損害の賠償は，ユーザーから当該損害が発生した月に受領した利用料の額を上限とします。
        </li>
        <li> Jazz Log は，本サービスに関して，ユーザーと他のユーザーまたは第三者との間において生じた取引，連絡または紛争等について一切責任を負いません。</li>
    </ol>
    <h2>第9条（サービス内容の変更等）</h2>
    <p> Jazz Log は，ユーザーに通知することなく，本サービスの内容を変更しまたは本サービスの提供を中止することができるものとし，これによってユーザーに生じた損害について一切の責任を負いません。</p>

    <h2>第10条（利用規約の変更）</h2>
    <p> Jazz Log は，必要と判断した場合には，ユーザーに通知することなくいつでも本規約を変更することができるものとします。なお，本規約の変更後，本サービスの利用を開始した場合には，当該ユーザーは変更後の規約に同意したものとみなします。
    </p>

    <h2>第11条（個人情報の取扱い）</h2>
    <p> Jazz Log は，本サービスの利用によって取得する個人情報については， Jazz Log 「プライバシーポリシー」に従い適切に取り扱うものとします。</p>

    <h2>第12条（通知または連絡）</h2>
    <p>ユーザーと Jazz Log との間の通知または連絡は， Jazz Log の定める方法によって行うものとします。 Jazz Log は,ユーザーから, Jazz Log が別途定める方式に従った変更届け出がない限り,現在登録されている連絡先が有効なものとみなして当該連絡先へ通知または連絡を行い,これらは,発信時にユーザーへ到達したものとみなします。
    </p>

    <h2>第13条（権利義務の譲渡の禁止）</h2>
    <p>ユーザーは， Jazz Log の書面による事前の承諾なく，利用契約上の地位または本規約に基づく権利もしくは義務を第三者に譲渡し，または担保に供することはできません。</p>

    <h2>第14条（準拠法・裁判管轄）</h2>
    <ol>
        <li>規約の解釈にあたっては，日本法を準拠法とします。</li>
        <li>サービスに関して紛争が生じた場合には， Jazz Log の本店所在地を管轄する裁判所を専属的合意管轄とします。</li>
    </ol>
    <h2>第15条（まとめ）</h2>
    <ol>
        <li>悪口は書かないでね。</li>
        <li>みんなで楽しく利用しようね。</li>
        <li>みんなで素敵な時間を過ごそう！！</li>
    </ol>
    <p class="end">以上</p>
</div>
@endsection
