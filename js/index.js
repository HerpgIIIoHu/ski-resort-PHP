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
      const btn = document.querySelector('.btn');
      const value = btn.getAttribute('value');
      window.location.href = `http://localhost:8080/backend/order.php?state=1&id=${value}`;
    } else {
      const btn = document.querySelector('.btn');
      const value = btn.getAttribute('value');
      window.location.href = `http://localhost:8080/backend/order.php?state=0&id=${value}`;
    }
  }
};
