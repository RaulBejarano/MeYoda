# MeYoda: Draft de requisitos del cliente
MeYoda es un portal web y móvil orientado a la compra-venta de cartas de Star Wars que funciona de una manera similar a cómo lo hace la bolsa.

Cada usuario del sistema puede tener un mazo de cartas dadas de alta que tiene constantemente en cotización para su venta. Los poseedores de cartas deberán entregar sus cartas al Banco de MeYoda en el momento en que la pongan en cotización para garantizar que se hace la venta en el momento en que se alcance la cotización mínima exigida por el vendedor.

Un usuario puede tener pujas por cartas que desea comprar mediante el depósito de la cantidad de dinero en el Banco de MeYoda, de tal forma que si la cotización de una de estas cartas por la que está pujando desciende por debajo del valor de cotización máximo establecido por él para la compra, deberá pagarla.

El valor de cotización de una carta es la fórmula:
- precio de venta mínimo para la carta + 10% de comisión de MeYoda  + factor de corrección de mercado aplicado por familiares de George Lucas
- las órdenes de compra se ejecutan en orden cronológico (las más antiguas primero)

# Misión
Implementar una demo con la funcionalidad esencial que convenza al cliente de invertir más dinero en el proyecto para lanzarlo en 3 meses.

# Recomendaciones
* Trabajar en equipos
* Usar github/bitbucket e invitar a los CTO (amuino@1uptalent.com, germandz@1uptalent.com)
* Tener una versión online lo antes posible (usando heroku, AWS, Azure, etc…)

