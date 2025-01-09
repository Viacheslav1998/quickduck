<script>
import { defineComponent, ref } from 'vue';

export default defineComponent({
  name: "SingleView",
  setup() {
    const images = ref([
      { src: "/soc-icons/sm1.png", alt: "ico 1" },
      { src: "/soc-icons/sm2.png", alt: "ico 2" },
      { src: "/soc-icons/sm3.png", alt: "ico 3" },
    ]);

    return {
      images,
    };
  },
});

</script>

<template>
  <div class="container">
    <div class="begin-news">
      <h1>это какая то новость</h1>
    </div>

    <nav aria-label="breadcrumb" class="pt-2">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Домой</a></li>
        <li class="breadcrumb-item"><a href="#">Рубрика</a></li>
        <li class="breadcrumb-item active" aria-current="page">Тег</li>
      </ol>
    </nav>


    <div class="custom-news">
      <div class="wrapper-main-box d-flex justify-content-between">
        <div class="box-date-time">
          <span>публикация: </span>
          <span>11.02.2024</span>
          <p>время: 22:30</p>
        </div>
        <div class="tags">
          <a href="#">#news</a>
          <a href="#">#игры</a>
          <a href="#">#интерессное</a>
        </div>
      </div>
      <img src="/images/m2.jpg" class="custom-images">
      <div class="custom-text pt-3">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nesciunt praesentium iusto incidunt dolor numquam quam quaerat et quis eum, odit fuga id possimus debitis, eos vitae omnis pariatur ab.
        Fugit ea eveniet facilis corrupti sed dolores magni dolore harum, natus, quis laudantium quod vitae non nulla iste veniam, et officiis consequatur ipsam! Vel dolorem labore ipsa corporis, blanditiis minima!
        Dignissimos sequi incidunt, dolores porro eligendi architecto ab enim iste omnis perspiciatis id ad quasi exercitationem quae reprehenderit dolorem soluta maxime laudantium officia vitae quas voluptatibus odit corporis ullam. Qui?
        Possimus voluptatum aspernatur esse quis necessitatibus rem reiciendis quisquam quidem quos nesciunt minima deserunt sequi repellat ratione perspiciatis, expedita minus amet suscipit molestias, culpa id similique. Saepe cupiditate consectetur alias?
        Soluta necessitatibus praesentium, dicta ducimus amet at optio blanditiis exercitationem, laudantium ex accusantium impedit. Ratione, non et cupiditate illum sit, iusto perferendis impedit in eligendi magni voluptatum voluptate veniam quam.
        Quaerat velit iure architecto? Earum fuga consectetur tempore ullam, possimus adipisci nam obcaecati minima vitae perferendis. Harum provident architecto officiis non dignissimos neque, veritatis hic, reiciendis accusamus nesciunt inventore illo?
        Quam perspiciatis voluptas deserunt impedit beatae ex repellendus eos temporibus aperiam suscipit assumenda velit, explicabo aut sit sapiente dolor nemo harum vitae minima iusto labore fugiat? Temporibus et ipsum pariatur?
        Enim, rerum ab illum quam culpa itaque minima debitis accusamus corrupti minus in quae voluptates magnam? Nostrum ut, inventore libero corrupti eos exercitationem, non esse nobis amet blanditiis animi molestias?
        Dignissimos nihil perferendis temporibus inventore doloremque quo asperiores accusamus maxime illum, id, pariatur, ratione iusto aliquid consequatur maiores itaque et! Inventore, soluta corrupti magni officia nesciunt neque deserunt labore dolor!
        Mollitia, reprehenderit voluptatum perspiciatis dolores veniam numquam iste quidem ut? Cupiditate, dicta iusto reprehenderit nemo aliquam mollitia facere ex labore modi saepe eaque a harum autem facilis qui sapiente quia.
        Libero ducimus nobis modi provident ipsa magnam hic labore, optio eaque rerum repellendus perspiciatis voluptas sapiente aperiam possimus obcaecati saepe cum. Minus hic dolorem facere architecto deserunt qui. Enim, sequi.
        Ullam nihil fugiat doloribus possimus distinctio tempora quidem est cum, iure harum et asperiores delectus minus totam id quasi deleniti facere aperiam animi pariatur accusantium, voluptatibus illo. Cumque, cum optio.
        Molestias similique exercitationem illum repellat quo quod a perspiciatis, magni, repellendus sapiente repudiandae neque quae incidunt nam reprehenderit numquam dolores ut quibusdam ducimus placeat perferendis, sit sunt nobis. Adipisci, optio!
        Nulla molestiae rerum ullam officia quam voluptas in ducimus minus aliquam at consequatur, quibusdam numquam eligendi ea nostrum impedit ex voluptatum? Illum tempore veniam explicabo maiores tempora harum inventore quaerat?
        Rem aspernatur, nam culpa inventore molestiae temporibus fugiat repellat doloremque modi suscipit, perspiciatis repellendus quas neque commodi nisi incidunt? Cum explicabo odio ipsa veniam molestiae voluptas necessitatibus numquam quisquam harum.
        Blanditiis officiis adipisci eligendi porro nobis hic quis sunt odit corporis saepe, consectetur minima dignissimos nam quidem totam qui! Commodi, quod animi aut dicta eveniet id tempora fugit soluta cumque?
        Quis optio eum iusto perferendis odio facere? Voluptas, similique ducimus necessitatibus consectetur nihil maiores officiis ad tempora consequatur libero temporibus voluptates distinctio error, iste quae sequi. Quaerat aliquid minima accusantium!
        Tenetur ad explicabo minus molestiae error pariatur sequi non fugit atque consequuntur blanditiis, deleniti cupiditate asperiores accusantium reprehenderit doloribus. Quod, officia ratione facilis ut expedita at mollitia voluptatibus natus eum!
        Hic ratione ipsam error quod pariatur minima magnam quaerat repellat perferendis iure, ad, mollitia minus autem rem nulla accusantium voluptas facere vero excepturi quae asperiores harum odio explicabo? Iusto, reprehenderit.
        Ab soluta esse numquam animi facere maiores minus tempore, id asperiores sunt inventore doloremque eum maxime nisi! Obcaecati rerum maiores id alias dignissimos dolore quasi, facere necessitatibus quod ipsa exercitationem!
        Quam aperiam nisi ducimus suscipit debitis ut odio quasi possimus voluptatum nobis, libero veniam, amet magnam quod esse dolore deserunt explicabo vel. Numquam cumque aspernatur veritatis! Voluptatem odit modi ipsum.
        Nemo necessitatibus mollitia magnam non eum repellendus ad distinctio suscipit corrupti sed quasi sint atque commodi vero obcaecati repellat perspiciatis minus, voluptatibus autem facere similique doloribus? Expedita quos maxime nemo.
        Quod ad voluptate doloremque, mollitia placeat magni praesentium, ab provident asperiores error cumque repellat aliquam, alias incidunt fuga? Recusandae deleniti harum exercitationem nihil provident sapiente voluptatum distinctio quia accusantium temporibus?
        Cumque explicabo exercitationem recusandae cupiditate repellat! Voluptatum molestiae ipsam veniam sunt nisi beatae repudiandae nesciunt, nobis optio rem laborum, libero quisquam culpa suscipit saepe, minima nostrum doloremque porro sint. Pariatur!
        Dolor esse, quidem beatae eum nam eveniet eaque nemo inventore sequi vitae, iste soluta hic. Expedita, nam aperiam vitae molestias sit rerum incidunt cumque exercitationem illo aliquid laborum, nisi veritatis.
        Sapiente aut possimus nostrum animi ducimus, magnam quo ullam sed optio laudantium, accusantium, porro eum numquam! Quam, nihil repellat veritatis harum deserunt voluptatibus iusto, quia aliquam quibusdam, provident quidem neque?
        Aperiam blanditiis voluptates maxime quibusdam quos magnam natus! Saepe cupiditate molestias non assumenda possimus quod, asperiores soluta labore tempora ratione reiciendis impedit doloremque magnam velit, rem voluptatum maiores veniam. Possimus.
        Magnam quasi dolores quibusdam porro temporibus dolorum adipisci necessitatibus praesentium illo cumque. Maxime inventore nisi praesentium ipsa, at reiciendis accusamus, ex fugit, rerum voluptas eligendi earum veritatis libero. Dolor, earum!
        Nam ducimus excepturi reprehenderit hic. Iste veniam, inventore recusandae quas modi sed? Tenetur itaque dolore incidunt veniam et voluptatum cumque non perferendis placeat totam. Praesentium nesciunt repudiandae quibusdam quos quo.
        Error aliquam eligendi optio commodi sint corporis, dolorem nisi quia doloribus. Libero itaque possimus reprehenderit, eaque iusto soluta quasi dolor culpa consequatur, quisquam quidem fugit? Laudantium praesentium nam voluptatum maxime.
        Ad, fugit dicta optio adipisci, corporis totam nesciunt error alias tempore eligendi delectus. Enim mollitia omnis, pariatur porro quas aliquid exercitationem reprehenderit nihil voluptate asperiores debitis quisquam autem cum maxime.
        Autem porro reiciendis consequuntur adipisci placeat nulla nam obcaecati sunt voluptate consectetur rem at, ipsam excepturi officiis ipsum voluptates explicabo eaque consequatur veritatis velit praesentium. Totam exercitationem adipisci error magni!
        Modi fuga consequuntur esse nulla culpa dicta at quo in? Sapiente, accusantium quo? Corporis accusantium dolore magnam, voluptate pariatur laborum? Fugit velit necessitatibus consequuntur tempora aspernatur ipsa? Accusamus, odit ex.
        Voluptatibus, deserunt? Amet cumque ut deleniti, natus autem maiores, atque repellendus praesentium nisi harum ducimus doloribus porro accusantium neque. Veniam laboriosam ex voluptatem soluta natus assumenda iure aut nihil aperiam.
        Repellat, adipisci nisi, et voluptates labore ducimus eos fugit id iusto sapiente dolorum. Vitae odit voluptatibus repellendus, similique ab sit! Molestias, vel aliquam. Non debitis eum optio esse, deserunt neque.
        Quidem eos dolorem quam iste obcaecati debitis, assumenda architecto ex vel minus repellendus voluptate consequatur provident iure nisi voluptatum dolor, vitae hic modi doloribus a. Similique sint et error a.
        Dignissimos, velit, ipsum omnis quod ex culpa esse soluta eligendi reiciendis distinctio magni hic obcaecati mollitia voluptatibus maxime, officiis autem molestias a eum ducimus fugit doloremque. Facilis saepe quod nam?
        Rem ab consequuntur hic. Ullam id, odit sint tenetur nam in, dicta soluta vitae unde alias perferendis ipsum odio quos omnis ex eveniet, asperiores voluptates. Corrupti asperiores vel nemo blanditiis!
        Ducimus quod commodi sint dignissimos illo aspernatur odit voluptate atque mollitia, dolor error eligendi ex? Natus explicabo, officiis quod minus tenetur voluptate saepe recusandae odit! Quidem reiciendis laudantium voluptatem voluptas!
        Odit est sapiente illum explicabo! Sapiente omnis quos itaque neque a accusamus beatae, explicabo fuga, quibusdam delectus maiores tempora soluta vero laboriosam unde impedit. Repellendus totam eos laboriosam quas autem.
        Maxime, distinctio assumenda cumque ullam ratione aspernatur cupiditate ab officiis, adipisci omnis iusto aperiam ad? Alias, tempora! Aliquid assumenda doloribus architecto minus? Reiciendis delectus laborum iste consequuntur non distinctio similique.
        Odit, illo doloremque. Harum facere, obcaecati excepturi incidunt fugiat dolor repudiandae qui saepe adipisci minima repellendus est ea non corrupti officia sed et voluptatibus alias? Sequi, quia perferendis. Aspernatur, sequi.
        Modi blanditiis voluptates minima ad quo laudantium odio voluptas placeat quidem rem, omnis doloribus nisi optio aut, et id inventore consectetur ex excepturi consequatur asperiores? Ducimus eveniet modi ea nemo.
        Enim repudiandae reiciendis dolorum et ea nemo iusto at dolor. Culpa quia earum corrupti, quas iusto quos nihil rerum exercitationem doloribus nesciunt quisquam odio in vitae eos molestiae, atque cumque.
        Odio ea eos aspernatur sunt facere, ipsa expedita enim, tempora molestias nihil nobis repudiandae delectus voluptatem nulla inventore? Consequuntur, mollitia accusantium libero harum nesciunt velit voluptas? Incidunt esse iure maxime?
        At numquam neque eaque sint nihil incidunt qui, eum voluptatibus ipsum odio laborum, vitae id! Eligendi, id voluptatum nostrum dolore excepturi nesciunt iusto recusandae incidunt quis, optio harum nam sit.
        Inventore, ipsa reprehenderit voluptate totam accusantium dolore deserunt neque fugit quibusdam quod facilis alias, esse, nam debitis eius. Qui odio quia quibusdam laboriosam molestiae iusto, repellendus ratione ex inventore minus?
        Neque blanditiis temporibus provident eaque libero? Placeat exercitationem ipsam doloremque voluptatibus magni architecto nihil consectetur nisi dignissimos atque error ad dicta numquam, molestiae voluptas laborum corporis facilis ab aliquid sequi.
        Fuga, quibusdam sunt! Repellendus quas non debitis facilis eaque dicta quae, delectus quibusdam quaerat odio eum sint earum obcaecati, officiis, distinctio eligendi voluptates harum tenetur amet! Tempora nam expedita necessitatibus.
        Culpa inventore amet velit cupiditate ut! Consequuntur et accusantium autem, blanditiis nobis fuga maxime facere, quo magnam facilis cumque quisquam minima? Culpa minima expedita, praesentium quod ratione est magni corrupti.</p>
      </div>
      <div class="wrapper-soc-content d-flex justify-content-between">
        <div class="box-info d-flex align-items-center" style="color: whtie;">
          <div class="px-2 box-icons"><img src="/icons/views.png" alt="просмотры"> 825</div>
          <div class="pr-2 box-icons"><img src="/icons/comments.png" alt="комментарии"> 200</div>
          <div class="box-reaction p-2 d-flex">
            <div class="image-stack">
              <img
                v-for="(image, index) in images" 
                :key="index"
                :src="image.src"
                :alt="image.alt"
                class="stacked-image"
                :style="{ left: `${index * 27}px` }"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
   <!-- comments -->
    <div class="wrapper-comment my-2">

      <div class="comment-moment pb-1 pt-2 px-2 mb-4">
        <h5>Оставь свой комментарий:</h5>
      </div>

      <div class="space-comment-area">
        <form @submit.prevent="createPerson">
          <div class="image-radio-group">
            <label>
              <input type="radio" name="smiley" value="/soc-icons/sm1.png" />
              <img src="/soc-icons/sm1.png" alt="Smiley 1">
            </label>
            <label>
              <input type="radio" name="smiley" value="/soc-icons/sm2.png" />
              <img src="/soc-icons/sm2.png" alt="Smiley 2">
            </label>
            <label>
              <input type="radio" name="smiley" value="/soc-icons/sm3.png" />
              <img src="/soc-icons/sm3.png" alt="Smiley 3">
            </label>
            <label>
              <input type="radio" name="smiley" value="/soc-icons/sm4.png" />
              <img src="/soc-icons/sm4.png" alt="Smiley 4">
            </label>
            <label>
              <input type="radio" name="smiley" value="/soc-icons/sm5.png" />
              <img src="/soc-icons/sm5.png" alt="Smiley 5">
            </label>
          </div>

          <div class="form-group">
            <label for="justCommentPerson">Пиши свой комментарий</label>
            <textarea class="form-control" id="justCommentPerson" rows="3"></textarea>
          </div>

          <button type="button" class="btn btn-info">Отправить комментарий</button>
        </form>
      </div>

      <div class="line"></div><br>

      <div class="comment-moment pb-1 pt-2 px-2 mb-4">
        <h5>Блок для комментариев:</h5>
      </div>

      <div class="wrapper-comments-persons">

        <div class="media">
          <img class="mr-3" src="..." alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="mt-0"><span>тема:</span> какая то новость</h5>
            я считаю, что это отличная статья
          </div>
        </div>

        <div class="media">
          <img class="mr-3" src="..." alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="mt-0"><span>тема:</span> какая то новость</h5>
            я считаю, что это отличная статья
          </div>
        </div>

        <div class="media">
          <img class="mr-3" src="..." alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="mt-0"><span>тема:</span> какая то новость</h5>
            я считаю, что это отличная статья
          </div>
        </div>

      </div>
    </div>
    
  </div>
</template>

<style scoped>
.begin-news {
  margin: 20px auto 10px auto;
  padding: 20px;
  border: 1px solid #666666;
  border-right:20px solid rgb(255, 51, 61);
}

.begin-news h1 {  font-weight: lighter; }
.breadcrumb { background-color: #232222; border: 1px solid #666666;}
.breadcrumb-item a { color: darkturquoise; }
.breadcrumb-item { color: white; }

.custom-comments {
  border: 1px solid #666666;
  padding: 10px;
  margin: 20px auto 20px auto;
}

.line { height: 1px; background-color: deepskyblue;}
.space-comment-area, .wrapper-comments-persons { padding: 20px; }
.comment-moment { background-color: darkslateblue;}
.wrapper-comment { background-color: #232222;}

label > input {
  visibility: hidden;
  position: absolute;;
}

label > input + img {
  cursor: pointer;
  border: 2px solid transparent;
  transition: all 0.3s ease;
  background-color: rgba(153, 50, 204, 0.158)
}

label > input:checked + img {
  border-radius: 50px;
  background-color: yellow;
}

label > input:hover + img {
  background-color: darkorchid;
}

</style>