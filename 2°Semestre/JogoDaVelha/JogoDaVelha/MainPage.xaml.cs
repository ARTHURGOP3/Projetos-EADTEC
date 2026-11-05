namespace JogoDaVelha
{
    public partial class MainPage : ContentPage
    {
        string vez = "X";

        public MainPage()
        {
            InitializeComponent();
        }

        private void Button_Clicked(object sender, EventArgs e)
        {
            Button btn = (Button)sender;

            btn.IsEnabled = false;

            if (vez == "X")
            {
                btn.Text = "X";
                vez = "O";
            }
            else
            {
                btn.Text = "O";
                vez = "X";
            }

            /* Verificando se o X ganhou */
            if (btn10.Text == "X" && btn11.Text == "X" && btn12.Text == "X")
            {
                DisplayAlertAsync("Parabéns!", "O X ganhou!", "OK");
                Zerar();
            }
            
            if (btn10.Text == "X" && btn13.Text == "X" && btn16.Text == "X")
            {
                DisplayAlertAsync("Parabéns!", "O X ganhou!", "OK");
                Zerar();
            }
            
            if (btn11.Text == "X" && btn14.Text == "X" && btn17.Text == "X")
            {
                DisplayAlertAsync("Parabéns!", "O X ganhou!", "OK");
                Zerar();
            }

            if (btn12.Text == "X" && btn15.Text == "X" && btn18.Text == "X")
            {
                DisplayAlertAsync("Parabéns!", "O X ganhou!", "OK");
                Zerar();
            }

            if (btn10.Text == "X" && btn14.Text == "X" && btn18.Text == "X")
            {
                DisplayAlertAsync("Parabéns!", "O X ganhou!", "OK");
                Zerar();
            }

            if (btn12.Text == "X" && btn14.Text == "X" && btn16.Text == "X")
            {
                DisplayAlertAsync("Parabéns!", "O X ganhou!", "OK");
                Zerar();
            }

            if (btn16.Text == "X" && btn17.Text == "X" && btn18.Text == "X")
            {
                DisplayAlertAsync("Parabéns!", "O X ganhou!", "OK");
                Zerar();
            }

            if (btn13.Text == "X" && btn14.Text == "X" && btn15.Text == "X")
            {
                DisplayAlertAsync("Parabéns!", "O X ganhou!", "OK");
                Zerar();
            }
            if (
                !btn10.IsEnabled &&
                !btn11.IsEnabled &&
                !btn12.IsEnabled &&
                !btn13.IsEnabled &&
                !btn14.IsEnabled &&
                !btn15.IsEnabled &&
                !btn16.IsEnabled &&
                !btn17.IsEnabled &&
                !btn18.IsEnabled
            ){
                 DisplayAlertAsync("Empate!", "O jogo terminou empatado!", "OK");
                Zerar();
            }

        } // Fecha método

        void Zerar()
        {
            btn10.Text = "";
            btn11.Text = "";
            btn12.Text = "";
            btn13.Text = "";
            btn14.Text = "";
            btn15.Text = "";
            btn16.Text = "";
            btn17.Text = "";
            btn18.Text = "";

            btn10.IsEnabled = true;
            btn11.IsEnabled = true;
            btn12.IsEnabled = true;
            btn13.IsEnabled = true;
            btn14.IsEnabled = true;
            btn15.IsEnabled = true;
            btn16.IsEnabled = true;
            btn17.IsEnabled = true;
            btn18.IsEnabled = true;


        }

    } // Fecha Classe
} // Fecha Namespace
