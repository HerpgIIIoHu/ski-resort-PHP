const onClickPrice = () => {
  const buttonCard = document.querySelector('.modal');
  buttonCard.classList.toggle('none');
};

const closeModal = () => {
  const close = document.querySelector('.modal');
  close.classList.toggle('none');
};

const logout = () => {
  if (window.confirm('Вы действительно хотите выйти?')) {
    window.location.href = 'http://localhost:8080/backend/logout.php';
  }
};

const buyTur = (session, id, price) => {
  if (session) {
    if (window.confirm('Вы действительно хотите купить тур и связаться с менеджером?')) {
      window.location.href = `http://localhost:8080/backend/buyTur.php?id=${id}&price=${price}`;
      alert('Заявка на тур успешно отправлена!');
    }
  } else {
    alert('Для того, чтобы отправить заявку, нужно авторизироваться на сайте!');
  }
};

const closeOrder = (id) => {
  if (window.confirm('Вы точно закрыли заявку?')) {
    if (window.confirm('Заявка была закрыта успешно?')) {
      window.location.href = `http://localhost:8080/backend/order.php?state=1&id=${id}`;
    } else {
      window.location.href = `http://localhost:8080/backend/order.php?state=0&id=${id}`;
    }
  }
};

const closeOrderHotel = (id) => {
  if (window.confirm('Вы точно закрыли заявку?')) {
    if (window.confirm('Заявка была закрыта успешно?')) {
      window.location.href = `http://localhost:8080/backend/orderHotel.php?state=1&id=${id}`;
    } else {
      window.location.href = `http://localhost:8080/backend/orderHotel.php?state=0&id=${id}`;
    }
  }
};

const payBtnClick = (name, price) => {
  const modal = document.querySelector('.modal_hotel');
  modal.classList.add('visible');
  document.body.style.overflowY = 'hidden';
  const formHotel = document.querySelector('#formHotel');
  formHotel.setAttribute('action', `../backend/hotelBooking.php?class=${name}&price=${price}`);
};
const closeModalHotel = () => {
  const modal = document.querySelector('.modal_hotel');
  modal.classList.remove('visible');
  document.body.style.overflowY = 'visible';
};
