using System.Globalization;

namespace MauiAppEventos
{
    public partial class App : Application
    {
        public App()
        {
            // Garante datas dd/MM/yyyy e moeda em R$ independentemente do idioma do dispositivo.
            var ptBR = new CultureInfo("pt-BR");
            CultureInfo.DefaultThreadCurrentCulture = ptBR;
            CultureInfo.DefaultThreadCurrentUICulture = ptBR;
            CultureInfo.CurrentCulture = ptBR;
            CultureInfo.CurrentUICulture = ptBR;

            InitializeComponent();
        }

        protected override Window CreateWindow(IActivationState? activationState)
        {
            var window = new Window(new AppShell());
            window.Width = 500;
            window.Height = 700;
            return window;
        }
    }
}
