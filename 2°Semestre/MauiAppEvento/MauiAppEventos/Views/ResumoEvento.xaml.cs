using MauiAppEventos.Models;

namespace MauiAppEventos.Views;

public partial class ResumoEvento : ContentPage
{
    public ResumoEvento(Evento evento)
    {
        InitializeComponent();
        BindingContext = evento;
    }

    private async void OnVoltarClicked(object? sender, EventArgs e)
    {
        try
        {
            await Navigation.PopAsync();
        }
        catch (Exception ex)
        {
            await DisplayAlertAsync("Ops", ex.Message, "OK");
        }
    }
}
