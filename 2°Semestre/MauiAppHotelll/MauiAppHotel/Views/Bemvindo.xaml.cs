namespace MauiAppHotel.Views;

public partial class Bemvindo : ContentPage
{
	public Bemvindo()
	{
		InitializeComponent();
	}

    private void Button_Clicked(object sender, EventArgs e)
    {
        try
        {
             Navigation.PushAsync(new ContratacaoHospedagem());
        }
        catch (Exception ex)
        {
             DisplayAlertAsync("Ops", ex.Message, "OK");
        }
    }

    private void Button_Clicked_1(object sender, EventArgs e)
    {
        try
        {
            Navigation.PushAsync(new ContratacaoHospedagem());
        }
        catch (Exception ex)
        {
            DisplayAlertAsync("Ops", ex.Message, "OK");
        }
    }
}