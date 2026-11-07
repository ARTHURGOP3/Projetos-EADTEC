namespace MauiAppHotel.Views;

public partial class ContratacaoHospedagem : ContentPage
{
    App PropriedadesApp;
    public ContratacaoHospedagem()
    {
        InitializeComponent();
        PropriedadesApp = (App) Application.Current;


        pck_quarto.ItemsSource = PropriedadesApp.Lista_quartos;

        dtpck_checkin.MinimumDate = DateTime.Now;
        

      
    }

    private async void Button_Clicked(object sender, EventArgs e)
    {
        try
        {
            await Navigation.PushAsync(new HospedagemContratada());
        }
        catch (Exception ex)
        {
            await DisplayAlertAsync("Ops", ex.Message, "OK");
        }
    }

    private void dtpck_checkin_DateSelected(object sender, DateChangedEventArgs e)
    {
        DatePicker elemento = sender as DatePicker;
        DateTime data_selecionada_checkin = elemento.Date.Value;
    }

    private void dtpck_checkout_DateSelected(object sender, DateChangedEventArgs e)
    {

    }
}