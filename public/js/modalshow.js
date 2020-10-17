'use strict';
{
  //（7)モーダルを使用した見せ方
  let teamMember = {
    memberInfo: [{
        name: "kakudaisuke",
        nickname: "kaku",
        imgSrc: "images/kaku.jpeg",
        inCharge: "リーダー・デザイン担当・サーバーサイド担当",
        modaltext: "kaku！ マイケル！ マイケル！ マイケル！",
      },
      {
        name: "tsuka",
        nickname: "tsuka",
        imgSrc: "images/tsuka.jpg",
        inCharge: "サーバーサイド担当",
        modaltext: "tsuka！ マイケル！ マイケル！ マイケル！",
      },
      {
        name: "ayaka",
        nickname: "ayaka",
        imgSrc: "images/ayaka.jpg",
        inCharge: "フロントエンド担当・デザイン担当",
        modaltext: "ayaka！ マイケル！ マイケル！ マイケル！",
      },
      {
        name: "waito",
        nickname: "waito",
        imgSrc: "images/waito.jpg",
        inCharge: "フロントエンド担当",
        modaltext: "waito！ マイケル！ マイケル！ マイケル！",
      },
      {
        name: "mikikeisuke",
        nickname: "mike",
        imgSrc: "images/mike.jpg",
        inCharge: "フロントエンド担当",
        modaltext: "mike！ マイケル！ マイケル！ マイケル！",
      },
    ]
  }

  // member-infoのprofile-img、
  const memberInfo = document.getElementsByClassName("member-info");
  const section_memberInfo = Array.from(memberInfo);
  const memberInfoImg = document.getElementsByClassName("profile-img");
  const section_memberInfoImg = Array.from(memberInfoImg);
  const memberInfoName = document.getElementsByClassName("member-name");
  const section_memberInfoName = Array.from(memberInfoName);
  const modalWrapper = document.getElementsByClassName("login-modal-wrapper");
  const section_modalWrapper = Array.from(modalWrapper);
  const closeBtn = document.getElementsByClassName("closeBtn");
  const section_closeBtn = Array.from(closeBtn);
  const prevBtn = document.getElementsByClassName("prevBtn");
  const section_prevBtn = Array.from(prevBtn);
  const nextBtn = document.getElementsByClassName("nextBtn");
  const section_nextBtn = Array.from(nextBtn);


  for (let i = 0; i < section_memberInfo.length; i++) {
    section_memberInfoImg[i].src = teamMember.memberInfo[i].imgSrc;
    section_memberInfoName[i].innerHTML = teamMember.memberInfo[i].nickname;
  }

  for (let i = 0; i < section_modalWrapper.length; i++) {
    const memberInfoModalProfileImg = document.getElementsByClassName("modal-profile-img");
    const section_memberInfoModalProfileImg = Array.from(memberInfoModalProfileImg);
    const memberInfoName = document.getElementsByClassName("name");
    const section_memberInfoName = Array.from(memberInfoName);
    const memberInfoInCharge = document.getElementsByClassName("in-charge");
    const section_memberInfoInCharge = Array.from(memberInfoInCharge);
    const memberInfoText = document.getElementsByClassName("modal-text");
    const section_memberInfoText = Array.from(memberInfoText);

    section_memberInfoModalProfileImg[i].src = teamMember.memberInfo[i].imgSrc;
    section_memberInfoName[i].innerHTML = teamMember.memberInfo[i].name;
    section_memberInfoInCharge[i].innerHTML = teamMember.memberInfo[i].inCharge;
    section_memberInfoText[i].innerHTML = teamMember.memberInfo[i].modaltext;
  }

  for (let i = 0; i < section_memberInfo.length; i++) {
    let index = i;
    let nextindex; 
    let previndex;

    section_nextBtn[i].addEventListener('click', function() {
      if (index == section_modalWrapper.length - 1) {
        nextindex = 0;
      } else {
        nextindex = index + 1;
      }
      section_modalWrapper[index].classList.remove("show");
      section_modalWrapper[nextindex].classList.add("show");
      if (section_modalWrapper[nextindex].classList.contains("show")) {
        section_closeBtn[nextindex].addEventListener('click', function() {
          section_modalWrapper[nextindex].classList.remove("show");
        })
      };
    });

    section_prevBtn[i].addEventListener('click', function() {
      if (index == 0) {
        previndex = section_modalWrapper.length - 1;
      } else {
        previndex = index - 1;
      }
      section_modalWrapper[index].classList.remove("show");
      section_modalWrapper[previndex].classList.add("show");
      if (section_modalWrapper[previndex].classList.contains("show")) {
        section_closeBtn[previndex].addEventListener('click', function() {
          section_modalWrapper[previndex].classList.remove("show");
        })
      };
    });

    section_memberInfo[i].addEventListener('click', function(event) {
      section_modalWrapper[i].classList.toggle("show");
      if (section_modalWrapper[i].classList.contains("show")) {
        section_closeBtn[i].addEventListener('click', function() {
          section_modalWrapper[i].classList.remove("show");
        })
      };
    });
  }

}