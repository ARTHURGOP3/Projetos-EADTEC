namespace mauiappmeucombustivel
{
    public partial class MainPage : ContentPage
    {
        int count = 0;

        public MainPage()
        {
            InitializeComponent();
        }

        private void Button_Clicked(object sender, EventArgs e)
        {
            try
            {
                double etanol = Convert.ToDouble(txt_etanol.Text);
                double gasolina = Convert.ToDouble(txt_gasolina.Text);
          

                string msg = "";
                                    
                if(etanol <= (gasolina * 0.7))
                {
                    msg = "O etanol está valendo mais a pena!";

                }
                else
                {
                    msg = "A gasolina está valendo mais a pena!";
                }


                string mensagem = $"{msg}\n\nVeículo: {marca_veiculo.Text} {modelo_veiculo.Text}";

                DisplayAlertAsync("Calculado", mensagem, "Ok"); //aqui só aceita 3 termos / variaveis 

            }
            catch (Exception ex)
            {
                DisplayAlertAsync("Ops", ex.Message, "Fechar");
            }
        } // fecha método 
    } //fecha class
} // fecha namespace
