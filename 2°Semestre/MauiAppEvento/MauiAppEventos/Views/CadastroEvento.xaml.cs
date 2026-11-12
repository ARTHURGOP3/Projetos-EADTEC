using MauiAppEventos.Models;

namespace MauiAppEventos.Views;

public partial class CadastroEvento : ContentPage
{
    private Evento _evento = new();

    public CadastroEvento()
    {
        InitializeComponent();
        BindingContext = _evento;
    }

    private async void OnConcluirClicked(object? sender, EventArgs e)
    {
        try
        {
            string? erro = _evento.Validar();
            if (erro is not null)
            {
                await DisplayAlertAsync("Ops", erro, "OK");
                return;
            }

            await Navigation.PushAsync(new ResumoEvento(_evento));

            // Prepara um novo cadastro em branco para quando o usuário voltar.
            _evento = new Evento();
            BindingContext = _evento;
        }
        catch (Exception ex)
        {
            await DisplayAlertAsync("Ops", ex.Message, "OK");
        }
    }
}
